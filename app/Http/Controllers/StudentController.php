<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    /**
     * Devuelve la vista en adminlte para registrar una nota
     */
    public function create()
    {
        return view('admin.students.create');
    }

    /**
     * Método que valida los datos del formulario y lo guarda en la tabla students
     */
    public function store(Request $request)
    {
        // Validamos los datos recibidos
        $datos = $request->validate([
            'name' => 'required|string|max:50',
            'modulo' => 'required|string',
            'mark' => 'required|decimal:0,2|min:0|max:10',
        ]);

        //Creamos una instancia del modelo y lo guardamos en la base de datos
        $student = new Student();
        $student->nombre = $datos['name'];
        $student->modulo = $datos['modulo'];
        $student->calificacion = $datos['mark'];
        $student->save();

        //Hacemos una consulta con el modulo Eloquent para que nos devuelva a todos los alumnos
        $students = Student::all();
        //Si todo ha salido bien hacemos un redirect con un mensaje de éxito y la variable students pasada
        return redirect()->route('student.create')->with('success', 'Calificación guardada')->with(compact('students'));
    }
}
