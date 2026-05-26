@extends('adminlte::page')

@section('title', $title ?? 'Gestion de Horas Extras')

@section('content_header')
    <h1>@yield('page-title', 'Historico de Cierres')</h1>
@stop

@section('content')
    {{-- Dynamic content --}}
    <div class="card-body">
        <form action="{{route('extras.historicocierresfilter')}}" method="POST">
            @csrf
            <div class="row">
                <div class="form-group col-md-2">
                   <label for="desde">Desde</label>
                   <input type="date" id="desde" name="desde" value="{{ $fechaDesde }}" class="form-control" required onchange="refrescarPantalla()">
                </div>
                <div class="form-group col-md-2">
                   <label for="hasta">Hasta</label>
                   <input type="date" id="hasta" name="hasta" value="{{ $fechaHasta }}" class="form-control" required onchange="refrescarPantalla()">
                </div>
            </div>
            <button id="btnRefrescar"  class="d-none">Refrescar</button>
        </form>
        <table id='doc'class="table table-bordered table-hover">
            <thead>
                <th class="text-center"  >Fecha Cierre</th>
                <th class="text-right">Cant.Extras</th>
                <th>Tipo</th>
                <th></th>
            </thead>
            <tbody>
                @foreach ($cierres as $cierre)
                    <tr>
                        <td class="text-center">{{ Carbon\Carbon::createFromDate($cierre->FechaCierre)->format('d-m-Y') }}</td>
                        <td class="text-right">{{Number::format($cierre->Extras)}}</td>
                        <td>{{$cierre->ExtraEstadoDesc}}</td>
                        <td class="text-center">
                            <form action="{{route('extras.export', $cierre->FechaCierre)}}" method="POST">
                                @csrf
                                <button type="submit" id="btnExport" class="btn btn-primary btn-sm">
                                    Exportar
                                </button>
                            </form>
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