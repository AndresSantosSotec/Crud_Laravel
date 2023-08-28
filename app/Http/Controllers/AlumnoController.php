<?php

namespace App\Http\Controllers;

use App\Models\alumno;
use App\Models\Nivel;
use Illuminate\Http\Request;

class AlumnoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
 

    public function index()
        {
            $alumnos = Alumno::all();
            return view('alumnos.alumnos', ['alumnos' => $alumnos]);
        }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('alumnos.create',['niveles'=>Nivel::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'matricula' => 'required|unique:alumnos|max:10',
            'nombre' => 'required|max:120',
            'fecha' => 'required|date',
            'telefono' => 'required',
            'email' => 'nullable|email',
            'nivel' => 'required',
        ]);
    
        $alumno = new Alumno();
        $alumno->matricula = $request->matricula;
        $alumno->nombre = $request->nombre;
        $alumno->fecha_nacimiento = $request->fecha;
        $alumno->telefono = $request->telefono;
        $alumno->email = $request->email;
        $alumno->nivel_id = $request->nivel;
        $alumno->save();
    
        return redirect()->route('alumnos.index')->with('success', 'Registro Guardado');
    }
    
    
    
    
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\alumno  $alumno
     * @return \Illuminate\Http\Response
     */
    public function show(alumno $alumno)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\alumno  $alumno
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $alumno = Alumno::find($id);
        return view('alumnos.edit', ['alumno' => $alumno, 'niveles' => Nivel::all()]);
    }
    
    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\alumno  $alumno
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $alumno = Alumno::find($id);
    
        $request->validate([
            // Validaciones aquí
        ]);
    
        // Actualiza los atributos del modelo con los datos del formulario
        $alumno->matricula = $request->matricula;
        $alumno->nombre = $request->nombre;
        $alumno->fecha_nacimiento = $request->fecha;
        $alumno->telefono = $request->telefono;
        $alumno->email = $request->email;
        $alumno->nivel_id = $request->nivel;
    
        // Guarda los cambios en la base de datos
        $alumno->save();
    
        return redirect()->route('alumnos.index')->with('success', 'Registro actualizado exitosamente');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\alumno  $alumno
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $alumno = Alumno::find($id);
    
        if (!$alumno) {
            return redirect()->route('alumnos.alumnos')->with('error', 'Registro no encontrado');
        }
    
        $alumno->delete();
    
        return redirect()->route('alumnos.alumnos')->with('success', 'Registro eliminado exitosamente');
    }
    
    
}
