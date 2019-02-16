@extends('layout')

@section('title', 'Creacion de expedientes')

@section('content')
    <h1>Crear expediente</h1>
    <form method="POST" action="{{ url('expedientes/creado') }}">
        {{ csrf_field() }}
        <input type="number" name="expedientNro" placeholder="Numero de expediente" >
        @if ($errors->has('expedientNro'))
            <p class="alert alert-danger">{{ $errors->first('expedientNro') }}</p>
        @endif
        <br>
        <input type="text" name="projectType" placeholder="Tipo de proyecto" value="{{ old('projectType') }}">
        @if ($errors->has('projectType'))
            <p class="alert alert-danger">{{ $errors->first('projectType') }}</p>
        @endif
        <br>
        <input type="text" name="subject" placeholder="Asunto">
        @if ($errors->has('subject'))
            <p class="alert alert-danger">{{ $errors->first('subject') }}</p>
        @endif
        <br>
        <input type="text" name="cover" placeholder="Caratula">
        @if ($errors->has('cover'))
            <p class="alert alert-danger">{{ $errors->first('cover') }}</p>
        @endif
        <br>
        <select name="state">
            @foreach(\App\Models\State::$states as $state)
                <option value="{{$state}}">{{$state}}</option>
            @endforeach
        </select>
        <br>
        <select name="archived" placeholder="Archivado">
            <option value=0>No</option>
            <option value=1>Si</option>
        </select>
        <br>
        <input type="text" name="incomeRecord" placeholder="Registro de entrada">
        <br>
        <input type="text" name="treatmentRecord" placeholder="Registro de tratamiento">
        <br>
        <button type="submit">Crear expediente</button>
    </form>


@endsection