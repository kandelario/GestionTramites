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

use function Laravel\Prompts\select;

class TramiteController extends AppBaseController
{
    /** @var TramiteRepository $tramiteRepository*/
    private $tramiteRepository;

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
            
        }elseif($user->hasRole('Superadmin') || $user->hasRole('Admin')){
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
        if(Auth::user()->hasRole('Supervisor de Plaza')){
            $miPlaza = DB::table('plazas')->where('id', Auth::user()->plaza_id_asignado)->first();
            $asesores = DB::table('asesores')->where('plaza_id', $miPlaza->id)->get();
            // $tramites = DB::table('tramites')->whereIn('asesor_id', $asesores)->paginate(10);  
        }else{
            $asesores = Asesor::all();
        }
        
        return view('tramites.create')
            ->with('asesores', $asesores);
    }

    /**
     * Store a newly created Tramite in storage.
     */
    public function store(CreateTramiteRequest $request)
    {
        $input = $request->all();

        $tramite = $this->tramiteRepository->create($input);

        Flash::success('Tramite saved successfully.');

        return redirect(route('tramites.index'));
    }

    /**
     * Display the specified Tramite.
     */
    public function show($id)
    {
        $tramite = $this->tramiteRepository->find($id);

        if (empty($tramite)) {
            Flash::error('Tramite not found');

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
            Flash::error('Tramite not found');

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
        $tramite = $this->tramiteRepository->find($id);

        if (empty($tramite)) {
            Flash::error('Tramite not found');

            return redirect(route('tramites.index'));
        }

        $tramite = $this->tramiteRepository->update($request->all(), $id);

        Flash::success('Tramite updated successfully.');

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
            Flash::error('Tramite not found');

            return redirect(route('tramites.index'));
        }

        $this->tramiteRepository->delete($id);

        Flash::success('Tramite deleted successfully.');

        return redirect(route('tramites.index'));
    }
}
