<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTramiteRequest;
use App\Http\Requests\UpdateTramiteRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\TramiteRepository;
use Illuminate\Http\Request;
use Laracasts\Flash\Flash;

use App\Models\Asesor;
use App\Models\Cliente;
use App\Models\Plaza;
use App\Models\Tramite;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Spatie\Permission\Traits\HasRoles;
use Spatie\Permission\Models\Role;

use function Laravel\Prompts\select;

class TramiteController extends AppBaseController
{
    /** @var TramiteRepository $tramiteRepository*/
    private $tramiteRepository;

    use HasRoles;

    public function __construct(TramiteRepository $tramiteRepo)
    {
        $this->tramiteRepository = $tramiteRepo;
    }

    /**
     * Display a listing of the Tramite.
     */
    public function index(Request $request)
    {
        // $tramites = $this->tramiteRepository->paginate(10);
        // if (Auth::user()->hasRole('Supervisor de Plaza')) {
            
        // } else {
            
        // }
        // $user = DB::table('users')->where('id', Auth::user()->id);
        $userID = Auth::user()->id;
        $users = '';
        $miPlaza = DB::table('plazas')->where('id', Auth::user()->plaza_id_asignado)->first();
        
        $user = Auth::user();
        // if ($user->hasRole('Supervisor de Plaza')) {
        if ($user->hasRole('Supervisor de Plaza')) {
            $asesores = DB::table('asesores')->select('id')->where('plaza_id', $miPlaza->id);
            $tramites = DB::table('tramites')->whereIn('asesor_id', $asesores)->paginate(10);
        }else{
            $tramites = $this->tramiteRepository->paginate(10);
        }
        // dd($users);
        
        $asesores = Asesor::all();
        $clientes = Cliente::all();
        $plazas = Plaza::all();

        return view('tramites.index')
            ->with('tramites', $tramites)
            ->with('asesores', $asesores)
            ->with('clientes', $clientes)
            ->with('plazas', $plazas);
    }

    /**
     * Show the form for creating a new Tramite.
     */
    public function create()
    {
        $user = Auth::user();
        try {
            if($user->hasRole('Supervisor de Plaza') ){
                $miPlaza = DB::table('plazas')->where('id', Auth::user()->plaza_id_asignado)->first();
                $asesores = DB::table('asesores')->where('plaza_id', $miPlaza->id)->get();
                // $tramites = DB::table('tramites')->whereIn('asesor_id', $asesores)->paginate(10);  
            }else{
                $asesores = Asesor::all();
            }
            return view('tramites.create')
                ->with('asesores', $asesores);
        } catch (\Throwable $th) {
            Flash::danger('Ocurrió un error al intentar registrar el trámite.');
            return redirect(route('tramites.index'));
        }
        
        
        
    }

    /**
     * Store a newly created Tramite in storage.
     */
    public function store(CreateTramiteRequest $request)
    {
        $request->validate([
            'c_nombre' => 'required',
            'c_nss' => 'required|numeric',
            'c_curp' => 'required',
            'asesor_id' => 'required',
            'tramite' => 'required',
            'c_monto' => 'required'
        ]);
        $input = $request->all();
        try {
            $tramite = new Tramite();
            $tramite->tramite = $request->tramite;
            $tramite->t_fecha_solicitud_recurso = $request->t_fecha_solicitud_recurso;
            $tramite->t_fecha_pago = $request->t_fecha_pago;
            $tramite->t_porcentaje = $request->t_porcentaje;
            $tramite->t_monto_para_asesor = $request->t_monto_para_asesor;
            if($request->t_estatus == null)
                $tramite->t_estatus = 'Pendiente';
            else
                $tramite->t_estatus = $request->t_estatus;
            $tramite->c_nombre = $request->c_nombre;
            $tramite->c_contacto = $request->c_contacto;
            $tramite->c_nss = $request->c_nss;
            $tramite->c_curp = $request->c_curp;
            $tramite->estatus_afore = $request->estatus_afore;
            $tramite->c_afore_fecha_baja = $request->c_afore_fecha_baja;
            $tramite->c_afore = $request->c_afore;
            if($request->c_monto == null)
                $tramite->c_monto = 0;
            else
                $tramite->c_monto = $request->c_monto;
            $tramite->asesor_id = $request->asesor_id;
            $tramite->save();
            // $tramite = $this->tramiteRepository->create($input);
            Flash::success('Tramite registrado con éxito.');
        } catch (\Throwable $th) {
            Flash::success('Tramite registrado con éxito. Error' . $th->getMessage());
        }

        return redirect(route('tramites.index'));
    }

    /**
     * Display the specified Tramite.
     */
    public function show($id)
    {
        $tramite = $this->tramiteRepository->find($id);

        if (empty($tramite)) {
            Flash::error('Tramite no encontrado');

            return redirect(route('tramites.index'));
        }

        return view('tramites.show')->with('tramite', $tramite);
    }

    /**
     * Show the form for editing the specified Tramite.
     */
    public function edit($id)
    {
        $tramite = $this->tramiteRepository->find($id);
        
        if (empty($tramite)) {
            Flash::error('Tramite no encontrado');

            return redirect(route('tramites.index'));
        }
        
        $asesores = DB::table('asesores')
            ->where('id', $tramite->asesor_id)->first();

        return view('tramites.edit')
            ->with('tramite', $tramite)
            ->with('asesores', $asesores);
    }

    /**
     * Update the specified Tramite in storage.
     */
    public function update($id, UpdateTramiteRequest $request)
    {
        $request->validate([
            'c_nombre' => 'required',
            'c_nss' => 'required|numeric',
            'c_curp' => 'required',
            'asesor_id' => 'required',
            'tramite' => 'required',
            'c_monto' => 'required'
        ]);
        $tramite = $this->tramiteRepository->find($id);

        if (empty($tramite)) {
            Flash::error('Tramite no encontrado');

            return redirect(route('tramites.index'));
        }
        $tramite->tramite = $request->tramite;
        $tramite->t_fecha_solicitud_recurso = $request->t_fecha_solicitud_recurso;
        $tramite->t_fecha_pago = $request->t_fecha_pago;
        $tramite->t_porcentaje = $request->t_porcentaje;
        $tramite->t_monto_para_asesor = $request->t_monto_para_asesor;
        if($request->t_estatus == null)
            $tramite->t_estatus = 'Pendiente';
        else
            $tramite->t_estatus = $request->t_estatus;
        $tramite->c_nombre = $request->c_nombre;
        $tramite->c_contacto = $request->c_contacto;
        $tramite->c_nss = $request->c_nss;
        $tramite->c_curp = $request->c_curp;
        $tramite->estatus_afore = $request->estatus_afore;
        $tramite->c_afore_fecha_baja = $request->c_afore_fecha_baja;
        $tramite->c_afore = $request->c_afore;
        if($request->c_monto == null)
            $tramite->c_monto = 0;
        else
            $tramite->c_monto = $request->c_monto;
        $tramite->asesor_id = $request->asesor_id;
        $tramite->save();

        // $tramite = $this->tramiteRepository->update($request->all(), $id);

        Flash::success('Tramite actualizado correctamente.');

        return redirect(route('tramites.index'));
    }

    /**
     * Remove the specified Tramite from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $tramite = $this->tramiteRepository->find($id);

        if (empty($tramite)) {
            Flash::error('Tramite no encontrado');

            return redirect(route('tramites.index'));
        }

        $this->tramiteRepository->delete($id);

        Flash::success('Tramite eliminado correctamente.');

        return redirect(route('tramites.index'));
    }
}
