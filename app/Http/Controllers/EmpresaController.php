<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\EditarEmpresaRequest;
use App\Http\Controllers\Controller;

use Session;
use App;

use App\Empresa;
use Auth;
use Request;
use App\PrettyUrl;

class EmpresaController extends Controller {
	
	/**
	 * Mostra a pagina inicial da Empresa
	 * @param   String 			 $prettyUrl 	  Se acessado diretamente, leva a suposta prettyUrl
	 * @return  View             index.blade.php
	 */
	public function index($prettyUrl = null) {

		//se nao veio nada na sessao e nem na url
		if(!$prettyUrl && !Session::has('empresa')) {
			App::abort(404);
		}

		//se o dado da sessao for diferente da prettyUrl digitada, pegar da url
		$empresa = Session::get('empresa', null);
		if (is_null($empresa) || $prettyUrl != $empresa->getUrl()) {
			Session::forget('empresa');
			
			$prettyUrlObj = PrettyUrl::all()->where('url', $prettyUrl)->first();

			//Se parametro for uma prettyURL, pegar objeto Empresa.
			if (!is_null($prettyUrlObj)) {
				$empresa = App\Empresa::find($prettyUrlObj->prettyurlable_id);
			} else {
				App::abort(404);
			}			
		}

		// Verifica se o usuário logado tem permissão de edição da Empresa
		// Caso possua, habilita uma flag de edição para a view.
		if (Auth::user()->id == $empresa->user->id) {
			$empresa->podeEditar = true;
		} else {
			$empresa->podeEditar = false;
		}
		return view('empresa.show', compact('empresa'));
	}


	/**
	 * Form de inserir Empresa.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('empresa.create');
	}

	/**
	 * Salva a Empresa no BD e redireciona pra home
	 * Criando tam´bém a prettyUrl associada a essa Empresa
	 *
	 * @return Response
	 */
	public function store()
	{
		$novaEmpresa = Auth::user()->empresas()->create(Request::all());

		$novaPrettyUrl = new PrettyUrl();
        $novaPrettyUrl->tipo = 'empresa';

        //se ja nao existir essa prettyUrl
        $novaPrettyUrl->url = $novaPrettyUrl->giveAvailableUrl($novaEmpresa->nome);
        $novaEmpresa->prettyUrl()->save($novaPrettyUrl);

		return redirect('home');
	}

	/**
	 * Mostra a empresa
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$empresa = Empresa::findOrFail($id);
		return view('empresa.show', compact('empresa'));
	}

	public function edit($id)
    {
		$user = Auth::user();
        $empresa = Empresa::findOrFail($id);

        return view('empresa.edit', compact('empresa', 'user') );
    }

    public function update($id, Requests\EditarEmpresaRequest $request)
    {
        $empresa = Empresa::findOrFail($id);

        $empresa->update($request->all());

		return view('empresa.show', compact('empresa'));
    }
  
}
