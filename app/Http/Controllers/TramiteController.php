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
use Illuminate\Support\Facades\DB;

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
        $tramites = $this->tramiteRepository->paginate(10);
        $asesores = Asesor::all();
        $clientes = Cliente::all();

        return view('tramites.index')
            ->with('tramites', $tramites)
            ->with('asesores', $asesores)
            ->with('clientes', $clientes);
    }

    /**
     * Show the form for creating a new Tramite.
     */
    public function create()
    {
        $asesores = Asesor::all();
        $clientes = Cliente::all();

        return view('tramites.create')
            ->with('asesores', $asesores)
            ->with('clientes', $clientes);
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
        $clientees = DB::table('clientes')
            ->where('id', $tramite->cliente_id)->first();

        return view('tramites.edit')
            ->with('tramite', $tramite)
            ->with('asesores', $asesores)
            ->with('clientes', $clientees);
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
