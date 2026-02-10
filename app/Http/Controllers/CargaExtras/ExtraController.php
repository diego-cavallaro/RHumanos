<?php

namespace app\Http\Controllers\CargaExtras;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Models\Extras\Extra;
use App\Models\Extras\ExtraReason;
use App\Models\Extras\Employee;
use App\Models\User;
use App\Http\Requests\Extras\StoreExtra;
use App\Http\Requests\Extras\UpdateExtra;

class ExtraController extends Controller
{
    public function index(): View
    {
        //Por defecto definimos como motivo 'Extras'
        $motivoInicial = 8;
        $fechaDesde = Carbon::now()->startOfMonth()->subMonth()->toDateString();
        $fechaHasta = Carbon::now()->toDateString();

        //Obtenemos el Area asociada al usuario Logueado
        //------------------------------------------------------------------
        $area = obtenerAreaUsuarioActual();
        //------------------------------------------------- ----------------
        $extrasMotivos = ExtraReason::orderBy('Id', 'asc')->get();
        //-----------------------------------------------------------------

        //Obtenemos las Extras filtradas según estos criterios (algunos por defecto)
        $queryExtras = Extra::with('Empleado')->where('area', $area)
                               ->where('ID_Motivo', $motivoInicial)
                               ->where('Vb1', 0)
                               ->where('Cerrado', 0)
                               ->whereBetween('Fecha', [$fechaDesde, $fechaHasta])
                               ->orderBy('Fecha', 'desc')->get();

        return view('extras.consultaExtras')->with(compact('extrasMotivos'))
                                            ->with(compact('queryExtras'))
                                            ->with('fechaDesde', $fechaDesde)
                                            ->with('fechaHasta', $fechaHasta)
                                            ->with('area', $area)
                                            ->with('idMotivo', $motivoInicial);
    }

    public function filter(Request $request)
    {
        //Obtenemos el Area asociada al usuario Logueado
        //------------------------------------------------------------------
        $area = obtenerAreaUsuarioActual();
        //------------------------------------------------- ----------------
        $extrasMotivos = ExtraReason::orderBy('Id', 'asc')->get();
        //-----------------------------------------------------------------
        
        if( $request->post('motivoExtra') != null){
            $motivo = $request->post('motivoExtra');
        };
        if( $request->post('desde') != null){
            $fechaDesde = $request->post('desde'); 
        }
        if( $request->post('hasta') != null){
            $fechaHasta = $request->post('hasta');
        }

        //Obtenemos las Extras filtradas según los nuevos criterios que vinieron por pantalla
        $queryExtras = Extra::with('Empleado')->where('area', $area)
                                 ->where('ID_Motivo', $motivo)
                                 ->where('Vb1', 0)
                                 ->where('Cerrado', 0)
                                 ->whereBetween('Fecha', [$fechaDesde, $fechaHasta])
                                 ->orderBy('Fecha', 'desc')->get();

        return view('extras.consultaExtras')->with(compact('extrasMotivos'))
                    ->with(compact('queryExtras'))
                    ->with('fechaDesde', $fechaDesde)
                    ->with('fechaHasta', $fechaHasta)
                    ->with('area', $area)
                    ->with('idMotivo', $motivo);
    }

    public function carga(): View
    {
        //Por defecto definimos como motivo 'Extras'
        $motivoInicial = 8;
        $fecha = \Carbon\Carbon::now()->toDateString();

        //-----------------------------------------------------------------
        $extrasMotivos = ExtraReason::orderBy('Id', 'asc')->get();
        //-----------------------------------------------------------------
        
        //Obtenemos el Login del usuario logueado
        $usuario = Auth::user();

        //Obtenemos la nomina asociada al usuario logueado
        $usuarios = DB::connection("RHumanos")->select("EXEC dbo.USP_FSC_PERSONAL_GETALL_BY_LOGIN ?", [$usuario->name]);

        return view('extras.cargaExtras')->with(compact('usuarios'))
                                         ->with(compact('extrasMotivos'))
                                         ->with('motivoInicial', $motivoInicial)
                                         ->with('fecha', $fecha);
    }

    public function edicion($rowId): View
    {
        $extra = Extra::find($rowId);

        //-----------------------------------------------------------------
        $extrasMotivos = ExtraReason::orderBy('Id', 'asc')->get();
        //Obtenemos el Login del usuario logueado -------------------------
        $usuario = Auth::user();
        //Obtenemos la nomina asociada al usuario logueado ----------------
        $usuarios = DB::connection("RHumanos")->select("EXEC dbo.USP_FSC_PERSONAL_GETALL_BY_LOGIN ?", [$usuario->name]);

        // dd($extra);
        return view('extras.edicionExtras')->with(compact('extra'))
                                           ->with(compact('usuarios'))
                                           ->with(compact('extrasMotivos'));
    }

    public function store(StoreExtra $request): RedirectResponse
    {
        // dd($request);

        DB::beginTransaction();
        try {
            $empleado = Employee::find($request->post('Empleado'));

            //Acomodamos horas con la fecha
            $extraDesde = Carbon::parse($request->post('Fecha'))->format('Ymd')." ".Carbon::parse($request->post('Desde'))->format('H:i:s');
            $extraHasta = Carbon::parse($request->post('Fecha'))->format('Ymd')." ".Carbon::parse($request->post('Hasta'))->format('H:i:s');

            $extra = new Extra();

            $extra->LegLegajo = $request->post('Empleado');
            $extra->LegSector = 1;
            $extra->Fecha = Carbon::parse($request->post('Fecha'))->format('Ymd');
            $extra->Extras = Carbon::parse($extraDesde)->diffInMinutes(Carbon::parse($extraHasta));
            $extra->Vb1 = 0;
            $extra->Vb2 = 0;
            $extra->ID_Motivo = $request->post('Motivo');
            $extra->Cerrado = 0;
            $extra->area = $empleado->Area;
            $extra->sector = $empleado->Sector;
            $extra->FechaAlta = \Carbon\Carbon::now()->toDateTimeString();
            $extra->Responsable = Auth::user()->name;
            $extra->Observaciones = $request->post('Observaciones');
            $extra->Desde = $extraDesde;
            $extra->Hasta = $extraHasta;
            $extra->EXTRA_ESTADO_ID = 1;  //Le asignamos estado 'Pendiente'

            $extra->save();

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            dd($e);
            return redirect()->route('extras.show')->with("error","Error al intentar grabar");
        }
        return redirect()->route('extras.show')->with("success","Agregado con éxito");
    }

    public function update(UpdateExtra $request): RedirectResponse
    {
        
        DB::beginTransaction();
        try {
            //dd($request->all()["RowId"]);
            
            $empleado = Employee::find($request->all()["Empleado"]);

            $extra = Extra::find($request->all()['RowId']);

            //Acomodamos horas con la fecha
            $extraDesde = Carbon::parse($request->all()['Fecha'])->format('Ymd')." ".Carbon::parse($request->all()['Desde'])->format('H:i:s');
            $extraHasta = Carbon::parse($request->all()['Fecha'])->format('Ymd')." ".Carbon::parse($request->all()['Hasta'])->format('H:i:s');

            $extra->LegLegajo = $request->all()['Empleado'];
            $extra->Fecha = Carbon::parse($request->all()['Fecha'])->format('Ymd');
            $extra->Extras = Carbon::parse($extraDesde)->diffInMinutes(Carbon::parse($extraHasta));
            $extra->ID_Motivo = $request->all()['Motivo'];
            $extra->area = $empleado->Area;
            $extra->sector = $empleado->Sector;
            $extra->Observaciones = $request->all()['Observaciones'];
            $extra->Desde = $extraDesde;
            $extra->Hasta = $extraHasta;

            $extra->save();

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            dd($e);
            return redirect()->route('extras.show')->with("error","Error al intentar grabar");
        }
        return redirect()->route('extras.show')->with("success","Modificado con éxito");
    }

    public function eliminar($rowId): RedirectResponse
    {
        DB::beginTransaction();
        try 
        {
            $extra = Extra::find($rowId);

            $extra->delete();

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            // dd($e);
            return redirect()->route('extras.show')->with("error","Error al intentar grabar");
        }
        
        return redirect()->route('extras.show');
    }

    public function aprobacion(): View
    {
        return view('extras.aprobacionExtras');
    }

    public function cierre(): View
    {
        return view('extras.cierreExtras');
    }

    public function aprobar(Request $request): RedirectResponse
    {
        $idsSeleccionados = $request->input('items', []); // Array de IDs
        // Lógica para procesar los IDs
        // Ejemplo: Item::whereIn('id', $idsSeleccionados)->update(['activo' => 1]);
        // return redirect()->back()->with('success', 'Items actualizados');
        return redirect()->route('extras.aprobacion')->with("success","Aprobación con éxito");
    }

    public function cerrar(Request $request): RedirectResponse
    {
        $idsSeleccionados = $request->input('items', []); // Array de IDs
        // Lógica para procesar los IDs
        // Ejemplo: Item::whereIn('id', $idsSeleccionados)->update(['activo' => 1]);
        // return redirect()->back()->with('success', 'Items actualizados');
        return redirect()->route('extras.cierre')->with("success","Cierre con éxito");
    }
}