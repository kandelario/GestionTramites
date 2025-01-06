<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePlazaRequest;
use App\Http\Requests\UpdatePlazaRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\PlazaRepository;
use Illuminate\Http\Request;
use Laracasts\Flash\Flash;

class PlazaController extends AppBaseController
{
    /** @var PlazaRepository $plazaRepository*/
    private $plazaRepository;

    public function __construct(PlazaRepository $plazaRepo)
    {
        $this->plazaRepository = $plazaRepo;
    }

    /**
     * Display a listing of the Plaza.
     */
    public function index(Request $request)
    {
        $plazas = $this->plazaRepository->paginate(10);

        return view('plazas.index')
            ->with('plazas', $plazas);
    }

    /**
     * Show the form for creating a new Plaza.
     */
    public function create()
    {
        return view('plazas.create');
    }

    /**
     * Store a newly created Plaza in storage.
     */
    public function store(CreatePlazaRequest $request)
    {
        $input = $request->all();

        $plaza = $this->plazaRepository->create($input);

        Flash::success('Plaza saved successfully.');

        return redirect(route('plazas.index'));
    }

    /**
     * Display the specified Plaza.
     */
    public function show($id)
    {
        $plaza = $this->plazaRepository->find($id);

        if (empty($plaza)) {
            Flash::error('Plaza not found');

            return redirect(route('plazas.index'));
        }

        return view('plazas.show')->with('plaza', $plaza);
    }

    /**
     * Show the form for editing the specified Plaza.
     */
    public function edit($id)
    {
        $plaza = $this->plazaRepository->find($id);

        if (empty($plaza)) {
            Flash::error('Plaza not found');

            return redirect(route('plazas.index'));
        }

        return view('plazas.edit')->with('plaza', $plaza);
    }

    /**
     * Update the specified Plaza in storage.
     */
    public function update($id, UpdatePlazaRequest $request)
    {
        $plaza = $this->plazaRepository->find($id);

        if (empty($plaza)) {
            Flash::error('Plaza not found');

            return redirect(route('plazas.index'));
        }

        $plaza = $this->plazaRepository->update($request->all(), $id);

        Flash::success('Plaza updated successfully.');

        return redirect(route('plazas.index'));
    }

    /**
     * Remove the specified Plaza from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $plaza = $this->plazaRepository->find($id);

        if (empty($plaza)) {
            Flash::error('Plaza not found');

            return redirect(route('plazas.index'));
        }

        $this->plazaRepository->delete($id);

        Flash::success('Plaza deleted successfully.');

        return redirect(route('plazas.index'));
    }
}
