<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Noticias;
use \App\Http\Resources\Noticias as NoticiasResource;

class NoticiasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $noticias = Noticias::all();

        return NoticiasResource::collection($noticias);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

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
        $noticia = $request -> isMethod('put') ? Noticias::findOrFail($request -> id) : new Noticias;
        
        $noticia->id =$request->input('id');
        $noticia->Titulo = $request->input('Titulo');
        $noticia->Descripcion = $request->input('Descripcion');
        $noticia->Anio = $request->input('Anio');
        $noticia->Escritor = $request->input('Escritor');

        if($noticia->save()){
            return new NoticiasResource($noticia);
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
        $noticia = Noticias::findOrFail($id);
        return new NoticiasResource($noticia);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $noticia = Noticias::findOrFail($id);
        if($noticia->delete()){
            return new NoticiasResource($noticia);
    }
}
}