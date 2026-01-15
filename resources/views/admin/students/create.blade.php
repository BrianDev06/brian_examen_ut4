@extends('adminlte::page')

@section('title', 'Registrar Nota')

@section('content_header')
    <h1>Registrar Nota</h1>
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            <h2>{{__('SixSeven')}}</h2>

            <form action="{{ route('student.store') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="name">Nombre del estudiante</label>
                    <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
                </div>

                <div class="form-group">
                    <label for="modulo">Módulo</label>
                    <input type="text" name="modulo" class="form-control" value="{{ old('modulo') }}" required>
                </div>

                <div class="form-group">
                    <label for="mark">Nota</label>
                    <input type="double" name="mark" class="form-control" value="{{ old('mark') }}" required min="0" max="10">
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-success">Subir nota</button>
                    <a href="" class="btn btn-secondary">Cancelar</a>
                </div>
            </form>
        </div>

        {{-- Aquí muestro todas las notas de los alumnos una vez enviado el formulario --}}
        @if(session('students'))  
            <table>
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Módulo</th>
                        <th>Nota</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- resources/views/admin/dashboard.blade.php 

                        @foreach ($students as $student)
                            <tr>
                                <td>{{$student->nombre}}</td>
                                <td>{{$student->modulo}}</td>
                                <td>{{$student->calificacion}}</td>
                            </tr>
                        @endforeach          
                    --}} 
                    <tr>
                        <td>Alumno1</td>
                        <td>DSW</td>
                        <td>10</td>
                    </tr>       
                    <tr>
                        <td>Alumno1</td>
                        <td>DSW</td>
                        <td>10</td>
                    </tr>       
                    <tr>
                        <td>Alumno1</td>
                        <td>DSW</td>
                        <td>10</td>
                    </tr>       
                    <tr>
                        <td>Alumno1</td>
                        <td>DSW</td>
                        <td>10</td>
                    </tr>       
                </tbody>
            </table>
        @endif

    </div>
@endsection