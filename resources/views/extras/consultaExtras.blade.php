@extends('adminlte::page')

@section('title', $title ?? 'Gestion de Horas Extras')

@section('content_header')
    <h1>@yield('page-title', 'Consulta de Horas')</h1>
@stop

@section('content')
    {{-- Dynamic content --}}
    <div class="card-body">
        <form action="{{route('extras.filter')}}" method="POST">
            @csrf
            <div class="row">
                <div class="form-group col-md-3">
                    <label for="motivoExtra">Motivo</label>
                    <select name="motivoExtra" id="motivoExtra" class="form-control" required onchange="refrescarPantalla()">
                       @foreach ($extrasMotivos as $motivo)
                          <option value="{{ $motivo->Id }}" {{$motivo->Id == $idMotivo ? "selected" : ""}} >{{ $motivo->Description }}</option>
                       @endforeach
                    </select>
                </div>
                {{--------------------------------------------------------------------------------------------}}
                <div class="form-group col-md-2">
                   <label for="desde">Desde</label>
                   <input type="date" id="desde" name="desde" value="{{ $fechaDesde }}" class="form-control" required onchange="refrescarPantalla()">
                </div>
                <div class="form-group col-md-2">
                   <label for="hasta">Hasta</label>
                   <input type="date" id="hasta" name="hasta" value="{{ $fechaHasta }}" class="form-control" required onchange="refrescarPantalla()">
                </div>
                <div class="form-group col-md-3">
                </div>
                <div class="form-group col-md-2 text-right">
                    <a href="{{ route('extras.carga') }}" class="btn btn-primary">
                        Carga de Horas
                    </a>
                </div>
                {{--------------------------------------------------------------------------------------------}}
            </div>
            <button id="btnRefrescar"  class="d-none">Refrescar</button>
        </form>
        <table id='doc'class="table table-bordered table-hover">
            <thead>
                <th>Legajo</th>
                <th>Nombres</th>
                <th>Fecha</th>
                <th>Desde</th>
                <th>Hasta</th>
                <th>Fecha Alta</th>
                <th>Responsable</th>
                <th>Horas (Min)</th>
                <th>Observaciones</th>
                <th></th>
                <th></th>
            </thead>
            <tbody>
                @foreach ($queryExtras as $extra)
                    {{-- {{dd($extra->Empleado)}}; --}}
                    <tr>
                        <td>{{$extra->LegLegajo}}</td>
                        <td>{{ $extra->Empleado->Apellido.", ".$extra->Empleado->Nombre }}</td>
                        <td class="text-center">{{ Carbon\Carbon::createFromDate($extra->Fecha)->format('d-m-Y') }}</td>
                        <td class="text-center">{{ Carbon\Carbon::createFromDate($extra->Desde)->format('H:i:s') }} </td>
                        <td class="text-center">{{ Carbon\Carbon::createFromDate($extra->Hasta)->format('H:i:s') }}</td>
                        <td class="text-center">{{ Carbon\Carbon::createFromDate($extra->FechaAlta)->format('d-m-Y') }}</td>
                        <td>{{$extra->Responsable}}</td>
                        <td class="text-right">{{ Carbon\Carbon::createFromDate($extra->Desde)->diffInMinutes(Carbon\Carbon::createFromDate($extra->Hasta)) }}</td>
                        <td>{{$extra->Observaciones}}</td>
                        <td class="text-center">
                            <a href="{{ route('extras.edicion', $extra->RowId) }}" class="btn btn-primary btn-sm">
                                Editar
                            </a>
                        </td>
                        <td class="text-center">
                            <a href="{{ route('extras.eliminar', $extra->RowId) }}" class="btn btn-primary btn-sm">
                                Borrar
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <hr>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="{{ asset('css/admin-custom.css') }}">
    @stack('styles')
@stop

@section('js')
    @stack('scripts')
    <script>
        function refrescarPantalla()
        {
            $("#btnRefrescar").click();
        }
    </script>
@stop