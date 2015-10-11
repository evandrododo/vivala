<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Perfil;
use App\Ong;
use App\Empresa;
use App\CategoriaEmpresa;
use App\CategoriaOng;
use Session;


class PaginaController extends Controller {

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Retorna ate 3 paginas dentre as Ongs/Empresas de um Usuario
     * @return Array<Ong|Empresa> 
     */
    public function getMenu($view = null) 
    {
        $paginas = Auth::user()->paginas;
        $paginas = $paginas->take(3);
        // dd($paginas);
        $view->with('paginas', $paginas);
    }

    public function getCriarpagina() 
    {
        $categoriasOngs = CategoriaOng::all();
        $categoriasEmpresas = CategoriaEmpresa::all();

        return view('paginas.criar', compact('categoriasOngs','categoriasEmpresas'));

    }

    public function getGerenciar() 
    {
        $paginas = Auth::user()->paginas;

        return view('paginas.gerenciar', compact('paginas'));
    }

    /**
     * Metodo para trocar a entidadeAtiva atual
     * @param  $id   		Id da entidade a ser acessada
     * @param  $tipo 		Tipo da entidade (ong|empresa|perfil)
     */
    public function getAcessarcomo ($id , $tipo) 
    {

        $entidadeAtiva_id = $id;
        $entidadeAtiva_tipo = $tipo;

        if ($entidadeAtiva_tipo && $entidadeAtiva_id) {

            $entidadeExiste = false;
            switch ($entidadeAtiva_tipo)  {
            case 'ong':
                # Retorna a ong na lista de ongs do usuario, ou o perfil
                $ong = Ong::find($entidadeAtiva_id);
                $entidadeExiste = ($ong && Auth::user()->ongs->find($id)) ? true : false;
                break;

            case 'empresa':
                # Retorna a empresa na lista de empresas do usuario, ou o perfil
                $empresa = Empresa::find($entidadeAtiva_id);
                $entidadeExiste = ($empresa && Auth::user()->empresas->find($id)) ? true : false;
                break;

            case 'perfil':
                # Retorna a empresa na lista de empresas do usuario, ou o perfil
                $perfil = Perfil::find($entidadeAtiva_id);
                $entidadeExiste = ($perfil && Auth::user()->perfil->id == $id) ? true : false;
                break;

            default:
                break;
            }

            if ($entidadeExiste) {
                Session::put('entidadeAtiva_id', $entidadeAtiva_id);
                Session::put('entidadeAtiva_tipo', $entidadeAtiva_tipo);
            } 

            return redirect('conectar');
        }
    }





    /**
     * Retorna a blade da pagina de Contato 
     */
    public function getContato()
    {
        return view('paginas.contato');
    }

    /**
     * Retorna a blade da pagina de ction getNossomanifesto  
     */
    public function getNossomanifesto()
    {
        return view('paginas.nossomanifesto');
    }

    /**
     * Retorna a blade da pagina de ction getOquefazemos 
     */
    public function getOquefazemos()
    {
        return view('paginas.oquefazemos');
    }

    /**
     * Retorna a blade da pagina de ction getParceiros  
     */
    public function getParceiros()
    {
        return view('paginas.parceiros');
    }

    /**
     * Retorna a blade da pagina de Politicaprivacidade 
     */
    public function getPoliticadeprivacidade()
    {
        return view('paginas.politicaprivacidade');
    }

    /**
     * Retorna a blade da pagina de Quemsomos 
     */
    public function getQuemsomos()
    {
        return view('paginas.quemsomos');
    }

    /**
     * Retorna a blade da pagina de Termosecondicoes  
     */
    public function getTermosecondicoes()
    {
        return view('paginas.termosecondicoes');
    }


}
