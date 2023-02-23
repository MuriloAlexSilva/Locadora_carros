<?php

namespace App\Http\Controllers;

use App\Models\Marca;
use Illuminate\Http\Request;

class MarcaController extends Controller
{
    public function __construct(Marca $marca)
    {
        $this->marca = $marca;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $marca = Marca::all();
        $marca = $this->marca->all();

        return response()->json($marca,200);
    }

   
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return 'Chegamos ate aqui';
        //dd($request->all());//Para debugar somente com o request
        // $marca = Marca::create($request->all());//Desta fkorma criamos o registro de forma massiva
        $marca = $this->marca->create($request->all());
        
        return response()->json($marca,201);
    }

    /**
     * Display the specified resource.
     *
     * @param  Integer  $marca foi troca do model para integer
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $marca = $this->marca->find($id);

        if($marca === null)
            return response()->json(['erro' => 'Recurso Indisponivel para visualização'],404);
     
        return response()->json($marca,200);
    }

        /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Integer  $marca
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $marca = $this->marca->find($id);

        if($marca === null)
            return response()->json(['erro' => 'Recurso Indisponivel para atualização'],404);

        $marca->update($request->all());
     
        return response()->json($marca,200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Integer  $marca
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $marca = $this->marca->find($id);

        if($marca === null)
            return response()->json(['erro' => 'Recurso Indisponivel para remoção'],404);

        $marca->delete();
     
        return response()->json(['msg' => 'O registro foi removido do banco de dados'],200);
    }
}
