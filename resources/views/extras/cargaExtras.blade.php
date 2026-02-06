@extends('adminlte::page')

@section('title', $title ?? 'Gestion de Horas Extras')

@section('content_header')
    <h1>@yield('page-title', 'Carga de Horas')</h1>
@stop

@section('content')
    {{-- Dynamic content --}}
    <div class="card-body">
        <form action="{{ route('extras.store')}}" method="POST">
            @csrf
            @method("POST")
            
            <div class="row">
               <div class="form-group col-md-2">
                  <label for="Fecha">Fecha</label>
                  <input type="date" name="Fecha" id="Fecha" value= "{{ old('Fecha') ? old('Fecha') : $fecha }}" class="form-control">
                </div>
               <div class="form-group col-md-3">
                  <label for="Motivo">Tipo</label>
                  <select name="Motivo" id="Motivo" class="form-control">
                      <option value = {{0}}>Seleccione...</option>
                      @foreach ($extrasMotivos as $motivo)
                        <option value="{{ $motivo->Id }}" {{( (old('Motivo') ? old('Motivo') : $motivoInicial) == $motivo->Id ? 'selected' : '')}} >{{ $motivo->Description }}</option>
                      @endforeach
                  </select>                
               </div>
               <div class="form-group col-md-4">
                  <label for="Empleado">Empleado</label>
                  <select name="Empleado" id="Empleado" class="form-control">
                      <option value = {{0}}>Seleccione...</option>
                      @foreach ($usuarios as $empleado)
                          <option value="{{ $empleado->legajo }}" {{(old('Empleado') == $empleado->legajo ? 'selected' : '')}} >{{ $empleado->apellidos .", " .$empleado->nombres}}</option>
                      @endforeach
                  </select>
               </div>
            </div>
            <div class="row">
               <div class="form-group col-md-2">
                  <label for="Desde">Desde</label>
                  <input type="time" id="Desde" name="Desde" value="{{old('Desde')}}" class="form-control" onchange="cambioHora()">
               </div>
               <div class="form-group col-md-2">
                  <label for="Hasta">Hasta</label>
                  <input type="time" id="Hasta" name="Hasta" value="{{old('Hasta')}}" class="form-control" onchange="cambioHora()">
               </div>
               <div class="form-group col-md-1">
                  <label for="total">Total</label>
                  <input type="text" id="total" name="total" value="0" class="form-control" readonly style="text-align: right;" >
               </div>
            </div>
            <div class="row">
               <div class="form-group col-md-11">
                  <label for="Observaciones">Observaciones</label>
                  <textarea name="Observaciones" id="Observaciones" rows="5" class="form-control" placeholder="Observaciones aquí..."></textarea>
               </div>
            </div>

            <div class="row col-md-12">
                @error('Empleado')
                    <span style="color: red">{{ $message }}</span>
                @enderror
            </div>
            <div class="row col-md-12">
                @error('Motivo')
                    <span style="color: red">{{ $message }}</span>
                @enderror
            </div>
            <div class="row col-md-12">
                @error('Desde')
                    <span style="color: red">{{ $message }}</span>
                @enderror
            </div>
            <div class="row col-md-12">
                @error('Hasta')
                    <span style="color: red">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit" id="btnGrabar" class="btn btn-primary" onclick="deshabilitaGraba(this);">
                {{-- <i class="fa-solid fa-floppy-disk"></i> --}}
                Grabar
            </button>
            <a href="{{ route('extras.show') }}" class="btn btn-secondary">
                {{-- <i class="fa-solid fa-ban"></i> --}}
                Cancelar
            </a>

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
        function cambioHora()
        {
            const timeDesde = document.getElementById('desde');
            const timeHasta = document.getElementById('hasta');

            if(!timeDesde || !timeHasta) return;

            let valorDesde = timeDesde.value;
            let valorHasta = timeHasta.value;

            if(!valorDesde || !valorHasta) return;

            // 2. Convertir a minutos totales
            const [h1, m1] = valorDesde.split(':').map(Number);
            const [h2, m2] = valorHasta.split(':').map(Number);
            
            const minutos1 = (h1 * 60) + m1;
            const minutos2 = (h2 * 60) + m2;

            // 3. Calcular diferencia (manejar casos que cruzan medianoche si es necesario)
            let diferencia = Math.abs(minutos2 - minutos1);
            
            const horas = Math.floor(diferencia / 60);
            const mins = diferencia % 60;

            const muestraTotal = document.getElementById('total');
            muestraTotal.value = diferencia;
        }

        function deshabilitaGraba(sender)
        {
            sender.disabled= true;
            sender.innerHTML = "<span class='spinner-border spinner-border-sm' role='status' aria-hidden='true'></span> Grabando...";
            sender.form.submit();
        }

    </script>
@stop