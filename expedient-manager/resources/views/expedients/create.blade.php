@extends('layout')

@section('title', 'Creacion de expedientes')

@section('content')
    <h1>Crear expediente</h1>

    <form method="POST" action="{{ url('expedientes/creado') }}">
        {{ csrf_field() }}
        <input type="number" name="expedientNro" placeholder="Numero de expediente">
        <input type="text" name="projectType" placeholder="Tipo de proyecto">
        <input type="text" name="subject" placeholder="Asunto">
        <input type="text" name="cover" placeholder="Caratula">
        <select name="state_id">
            <option value=1>Activo</option>
            <option value=2>Inactivo</option>
            <option value=3>Prueba</option>
            <option value=4">Aprobado</option>
        </select>
        <select name="archived" placeholder="Archivado">
            <option value=1>Si</option>
            <option value=0>No</option>
        </select>
        <input type="text" name="incomeRecord" placeholder="Registro de entrada">
        <input type="text" name="treatmentRecord" placeholder="Registro de tratamiento">

        <button type="submit">Crear expediente</button>
    </form>


@endsection