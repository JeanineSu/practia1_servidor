<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAlumnoRequest;
use App\Http\Requests\UpdateAlumnoRequest;

class AlumnoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $alumnos=Alumno::all();

        $campos=$alumnos[0]->getAttributes();
        $campos=array_keys($campos);
//        info($campos); para ver que te lo hace bien

        $alumnos=json_encode($alumnos);
        $campos=json_encode($campos);
//        info($campos);
//        dd($campos);
        return view("crud/alumnos", ["alumnos"=>$alumnos, "campos"=>$campos, "nombre"=>"Alumnos"]);


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("crud/create");
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreAlumnoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAlumnoRequest $request)
    {
        $alumno=new Alumno($request->input());
        $alumno->saveOrFail();

        return redirect(route("alumnos.index"));
//        $alumnos=Alumno::all();
//        return view("crud/alumnos", ["alumnos" =>$alumnos]);
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Alumno  $alumno
     * @return \Illuminate\Http\Response
     */
    public function show(Alumno $alumno)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Alumno  $alumno
     * @return \Illuminate\Http\Response
     */
    public function edit(Alumno $alumno)
    {

        return view("crud.edit", ["alumno"=> $alumno]);
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAlumnoRequest  $request
     * @param  \App\Models\Alumno  $alumno
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAlumnoRequest $request, Alumno $alumno)
    {
        $alumno->update($request->input()); //actualizar con los nuevos valores
        $alumnos=Alumno::all();
        return redirect(route("alumnos.index"));
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Alumno  $alumno
     * @return \Illuminate\Http\Response
     */
    public function destroy(Alumno $alumno)
    {
        $alumno->delete();
        $alumnos=Alumno::all();
        return ["alumnos" =>$alumnos, "saludo"=>"hola caracola"];
        //return view("crud/alumnos", ["alumnos" =>$alumnos]);
        //
    }
}
