<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Peliculas;
use \App\Http\Resources\Peliculas as PeliculasResource;

class PeliculasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $peliculas = Peliculas::all();

        return PeliculasResource::collection($peliculas);
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
        $pelicula = $request -> isMethod('put') ? Peliculas::findOrFail($request -> id) : new Peliculas;

        $pelicula->id = $request->input('id');
        $pelicula->Titulo = $request->input('Titulo');
        $pelicula->Genero = $request->input('Genero');
        $pelicula->Anio = $request->input('Anio');
        $pelicula->Director = $request->input('Director');
        $pelicula->Productor = $request->input('Productor');

        if($pelicula->save()){
            return new PeliculasResource($pelicula);
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
        $pelicula = Peliculas::findOrFail($id);

        return new PeliculasResource($id);
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
        $pelicula = Peliculas::findOrFail($id);

        if($pelicula->delete()){
            return new PeliculasResource($pelicula);
        }
    }
}
