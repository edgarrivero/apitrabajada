<?php

namespace App\Http\Controllers;

use App\Estudiante;
use App\Docente;
use MyEvent;
use Validator;
use Illuminate\Http\Request;
use App\Http\Requests\EstudiantesRequest;
use DB;


class EstudianteController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $estudiantes = Estudiante::all();
        if (!$estudiantes){
            return response()->json('Aun no hay Estudiantes Agregados', 201);
        }
        return response()->json($estudiantes, 201);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EstudiantesRequest $request)
    {
        //event(new MyEvent('hello world'));
        //$docen = Docente::find($request->docente_id);
        $docen = DB::table('docentes')->where('id', $request->docente_id)->exists();

        try {

            if (!$docen) {
                return response()->json('Ese docente no existe', 422);
            }

            //Estudiante::created($request->all());
            $student = new Estudiante($request->all());
            $student->save();
            return response()->json('Estudiante creado', 200);


        }catch (\Exception $ex){
            return response()->json($ex->getMessage(), 402);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Estudiante  $estudiante
     * @return \Illuminate\Http\Response
     */
    public function show(Estudiante $estudiante)
    {
        return response()->json($estudiante, 201);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Estudiante  $estudiante
     * @return \Illuminate\Http\Response
     */
    public function update(EstudiantesRequest $request, Estudiante $estudiante)
    {
        try {
            $estudiante->nombre = $request->nombre;
            $estudiante->edad = $request->edad;
            $estudiante->docente_id = $request->docente_id;
            $estudiante->save();

            return response()->json('Actualizado con exito', 201);
        }catch (\Exception $ex){
            return response()->json(["error"=>$ex->getMessage()]);
        }

    }

    public function destroy(Estudiante $estudiante)
    {
        $estudiante->delete();
        $todos = Estudiante::all();
        return response()->json($todos, 201);
    }
}
