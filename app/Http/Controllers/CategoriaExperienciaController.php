<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\CategoriaExperiencia;
use App\Http\Requests\StoreCategoriaExperienciaRequest;
use App\Http\Requests\UpdateCategoriaExperienciaRequest;


/**
 * Controller para controllar as rotas que lidam com
 * Categorias de experiecias, assim nos aproximamos uma interface
 * RESTful
 */
class CategoriaExperienciaController extends Controller
{

    /**
     * Construtor do controller, aqui insiro dependencias que ele pode ter,
     */
    function __construct()
    {
        //as rotas desse controller só serao acessadas por quem esta logado
        $this->middleware('auth');

        //e é um admin definido no .env em ADMIN_IDS=x,y,z
        $this->middleware('admin');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('experiencias.categorias.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(StoreCategoriaExperienciaRequest $request)
    {
        CategoriaExperiencia::create($request->all());
        return redirect('/gestao/experiencias');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $Categoria = CategoriaExperiencia::findOrFail($id);
        return view('experiencias.categorias.edit')->with('Categoria', $Categoria);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(UpdateCategoriaExperienciaRequest $request,  $id)
    {
        $Categoria = CategoriaExperiencia::findOrFail($id);
        $Categoria->update($request->all());
        return redirect('/gestao/experiencias');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy(Request $request, $id)
    {
        $Categoria = CategoriaExperiencia::findOrFail($id)->delete();
        return ['sucess' => true];
    }
}
