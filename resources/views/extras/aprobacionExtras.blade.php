@extends('adminlte::page')

@section('title', $title ?? 'Gestion de Horas Extras')

@section('content_header')
    <h1>@yield('page-title', 'Aprobación de Horas')</h1>
@stop

@section('content')
    {{-- Dynamic content --}}
    <div class="card-body">
        <form action="{{route('extras.filteraprobacion')}}" method="POST">
            @csrf
            <div class="row">
                <div class="form-group col-md-4" style="text-align: left">
                    <select name="motivoExtra" id="motivoExtra" class="form-control" required onchange="refrescarPantalla()">
                       @foreach ($extrasMotivos as $motivo)
                          <option value="{{ $motivo->Id }}" {{$motivo->Id == $idMotivo ? "selected" : ""}} >{{ $motivo->Description }}</option>
                       @endforeach
                    </select>
                </div>
                <div class="form-group col-md-5" style="text-align: left">
                </div>
                <div class="form-group col-md-2" style="text-align: left">
                    {{-- <label for="estadoExtra">Estado a Aplicar</label> --}}
                    <select name="estadoExtra" id="estadoExtra" class="form-control" required onchange="refrescarPantalla()">
                       @foreach ($extrasEstados as $estado)
                          <option value="{{ $estado->Id }}" {{$estado->Id == $idEstado ? "selected" : ""}} >{{ $estado->Description }}</option>
                       @endforeach
                    </select>
                </div>
                <div class="form-group col-md-1" style="vertical-align: bottom">
                    <a href="{{ route('extras.aprobar') }}" class="btn btn-primary">
                        Aplicar
                    </a>
                </div>
            </div>
            <button id="btnRefrescar"  class="d-none">Refrescar</button>
        </form>

{{-- EJEMPLO --}}
{{-- <form action="{{ route('items.procesar') }}" method="POST">
    @csrf
    <table>
        @foreach($items as $item)
        <tr>
            <td><input type="checkbox" name="items[]" value="{{ $item->id }}"></td>
            <td>{{ $item->nombre }}</td>
        </tr>
        @endforeach
    </table>
    <button type="submit">Procesar Seleccionados</button>
</form> --}}
{{-- EJEMPLO --}}

        <form action="{{ route('extras.aprobar') }}" method="POST">
            <table id='extras'class="table table-bordered table-hover">
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
                    <th><input type="checkbox" id="todos" name="todos" value="todos" onclick="marcarDesmarcar()"></th>
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
                            <td><input type="checkbox" name="items[]" value="{{ $extra->RowId }}"></td>
                            {{-- <td class="text-center">
                                <a href="{{ route('extras.edicion', $extra->RowId) }}" class="btn btn-primary btn-sm">
                                    Editar
                                </a>
                            </td>
                            <td class="text-center">
                                <a href="{{ route('extras.eliminar', $extra->RowId) }}" class="btn btn-primary btn-sm">
                                    Borrar
                                </a>
                            </td> --}}
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <hr>
        </form>
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

        function marcarDesmarcar()
        {
            //Obtenemos el estado del checkBox principal
            var value = $('#todos').is(':checked');
            $("#extras").each(function(e)
            {
                $(this).find("input").attr('checked', value);
            });
        }
    </script>
@stop