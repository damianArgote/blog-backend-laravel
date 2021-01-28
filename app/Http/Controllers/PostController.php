<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return Post::all();
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
        $post = new Post;
        $post->name=$request->name;
        $post->image=$request->image;
        $post->content=$request->content;
        $post->categoryId=$request->categoryId;

        $result = $post->save();

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
        $post = Post::find($id);
        $result = $post;

        if($result){
            return $post;
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
        $post = Post::where("id", $id)->update(
            $request->all()
        );

        return ["Result" => "Actualizado"];
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
        $post = Post::find($id);

        $result = $post->delete();

        if($result){
            return ['Result' => 'Registro eliminado!'];
        }else{
            return ['Result' => 'Error al eliminar el registro'];
        }
    }
}
