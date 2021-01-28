<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return Category::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $category = new Category;
        $category->name=$request->name;
        $result = $category->save();

        if($result){
            return ['Result' => 'Datos recibidos'];
        }else{
            return ['Result' => 'Error en la creacion'];
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $category = Category::find($id);
        $result = $category;

        if($result){
            return [$result];
        }else{
            return ['Result' => 'El registro no existe'];
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $category = Category::find($id);
        $category->name = $request->name;

        $result=$category->save();
        if($result){
            return ['Result' => 'Datos actualizados'];
        }else{
            return ['Result' => 'Error en la actualizacion'];
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $category = Category::find($id);

        $result = $category->delete();

        if($result){
            return ['Result' => 'Registro eliminado!'];
        }else{
            return ['Result' => 'Error al eliminar el registro'];
        }
    }

    public function recovery($id){

        $category = Category::withTrashed()->where('id',$id)->get();
        
        $result = $category->restore();

        if($result){
            return ['Result' => 'Registro recuperado!'];
        }else{
            return ['Result' => 'Error  al recuperar'];
        }
    }
}
