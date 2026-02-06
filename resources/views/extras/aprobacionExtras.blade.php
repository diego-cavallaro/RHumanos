@extends('adminlte::page')

@section('title', $title ?? 'Gestion de Horas Extras')

@section('content_header')
    <h1>@yield('page-title', 'Aprobación de Horas')</h1>
@stop

@section('content')
    {{-- Dynamic content --}}
    <div class="card-body">
        <form action="" method="POST">
            @csrf
            <div class="row">
               <label for="Empleado">Empleado</label>
               <select name="Empleado" id="Empleado" class="form-control">
                  {{-- <option value = {{0}} {{$estadoCoquilla == 0 ? "selected" : "" }}>Seleccione...</option>
                  @foreach ($estadosCoquilla as $estado)
                     <option value="{{ $estado->ID }}" {{$estado->ID == $estadoCoquilla ? "selected" : ""}} >{{ $estado->DESCRIPCION }}</option>
                  @endforeach --}}
               </select>
            </div>
        </form>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="{{ asset('css/admin-custom.css') }}">
    @stack('styles')
@stop

@section('js')
    @stack('scripts')
@stop