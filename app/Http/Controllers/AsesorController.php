<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateAsesorRequest;
use App\Http\Requests\UpdateAsesorRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\AsesorRepository;
use Illuminate\Http\Request;
use Laracasts\Flash\Flash;

class AsesorController extends AppBaseController
{
    /** @var AsesorRepository $asesorRepository*/
    private $asesorRepository;

    public function __construct(AsesorRepository $asesorRepo)
    {
        $this->asesorRepository = $asesorRepo;
    }

    /**
     * Display a listing of the Asesor.
     */
    public function index(Request $request)
    {
        $asesors = $this->asesorRepository->paginate(10);

        return view('asesors.index')
            ->with('asesors', $asesors);
    }

    /**
     * Show the form for creating a new Asesor.
     */
    public function create()
    {
        return view('asesors.create');
    }

    /**
     * Store a newly created Asesor in storage.
     */
    public function store(CreateAsesorRequest $request)
    {
        $input = $request->all();

        $asesor = $this->asesorRepository->create($input);

        Flash::success('Asesor guardado satisfactoriamente.');

        return redirect(route('asesors.index'));
    }

    /**
     * Display the specified Asesor.
     */
    public function show($id)
    {
        $asesor = $this->asesorRepository->find($id);

        if (empty($asesor)) {
            Flash::error('Asesor not found');

            return redirect(route('asesors.index'));
        }

        return view('asesors.show')->with('asesor', $asesor);
    }

    /**
     * Show the form for editing the specified Asesor.
     */
    public function edit($id)
    {
        $asesor = $this->asesorRepository->find($id);

        if (empty($asesor)) {
            Flash::error('Asesor not found');

            return redirect(route('asesors.index'));
        }

        return view('asesors.edit')->with('asesor', $asesor);
    }

    /**
     * Update the specified Asesor in storage.
     */
    public function update($id, UpdateAsesorRequest $request)
    {
        $asesor = $this->asesorRepository->find($id);

        if (empty($asesor)) {
            Flash::error('Asesor not found');

            return redirect(route('asesors.index'));
        }

        $asesor = $this->asesorRepository->update($request->all(), $id);

        Flash::success('Asesor updated successfully.');

        return redirect(route('asesors.index'));
    }

    /**
     * Remove the specified Asesor from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $asesor = $this->asesorRepository->find($id);

        if (empty($asesor)) {
            Flash::error('Asesor not found');

            return redirect(route('asesors.index'));
        }

        $this->asesorRepository->delete($id);

        Flash::success('Asesor deleted successfully.');

        return redirect(route('asesors.index'));
    }
}
