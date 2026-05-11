@extends('adminlte::page')

@section('title', $title ?? 'Gestion de Horas Extras')

@section('content_header')
    <h1>@yield('page-title', 'Cierre de Horas')</h1>
@stop

@section('content')
    {{-- Dynamic content --}}
    <div class="card-body">
        <div class="row">
            <div class="form-group col-md-4" style="text-align: left">
                <form action="{{route('extras.filtercierre')}}" method="POST">
                    @csrf
                    <select name="motivoExtra" id="motivoExtra" class="form-control" required onchange="refrescarPantalla()">
                        @foreach ($extrasMotivos as $motivo)
                           <option value="{{ $motivo->Id }}" {{$motivo->Id == $idMotivo ? "selected" : ""}} >{{ $motivo->Description }}</option>
                        @endforeach
                    </select>
                    <button id="btnRefrescar"  class="d-none">Refrescar</button>
                </form>
            </div>
            <div class="form-group col-md-7" style="text-align: right; vertical-align: middle">
                <label for="btnExport">Ultimo Cierre {{Carbon\Carbon::parse($ultimoCierre->FechaCierre)->format('d/m/Y')}}</label>
            </div>
            <div class="form-group col-md-1" style="text-align: right">
                <form action="{{route('extras.export')}}" method="POST">
                    @csrf
                    <input type="hidden" name="ultimoCierre" id="ultimoCierre" value="{{$ultimoCierre->FechaCierre}}">
                    <button type="submit" id="btnExport" class="btn btn-secondary">
                        Exportar
                    </button>
                </form>
            </div>
        </div>
        <form action="{{ route('extras.cerrar') }}" method="POST">
            @csrf
            <div class="row">
                <div class="form-group col-md-9">
                </div>
                <div class="form-group col-md-2" style="text-align: left">
                    {{-- <label for="estadoExtra">Estado a Aplicar</label> --}}
                    <select name="estadoExtra" id="estadoExtra" class="form-control" required>
                       @foreach ($extrasEstados as $estado)
                          <option value="{{ $estado->Id }}" {{$estado->Id == $idEstado ? "selected" : ""}} >{{ $estado->Description }}</option>
                       @endforeach
                    </select>
                </div>
                <div class="form-group col-md-1" style="text-align: right">
                    <button type="submit" id="btnAplicar" class="btn btn-primary" onclick="deshabilitaGraba(this);">
                        Aplicar
                    </button>
                </div>
            </div>
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
                            <td><input type="checkbox" name="items[]" value="{{ $extra->RowId }}" id="items-{{ $extra->RowId }}"></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <hr>
            <div class="row col-md-12">
                @error('error')
                    <span style="color: red">{{ $message }}</span>
                @enderror
            </div>
            <div class="row col-md-12">
                @error('success')
                    <span style="color: green">{{ $message }}</span>
                @enderror
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

        function deshabilitaGraba(sender)
        {
            sender.disabled= true;
            sender.innerHTML = "<span class='spinner-border spinner-border-sm' role='status' aria-hidden='true'></span> Grabando...";
            sender.form.submit();
        }

    </script>
@stop