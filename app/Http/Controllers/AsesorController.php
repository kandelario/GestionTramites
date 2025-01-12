<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateAsesorRequest;
use App\Http\Requests\UpdateAsesorRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\Asesor;
use App\Repositories\AsesorRepository;
use Illuminate\Http\Request;
use Laracasts\Flash\Flash;

use App\Models\Plaza;

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
        $plazas = Plaza::all();

        return view('asesors.index')
            ->with('asesors', $asesors)
            ->with('plazas', $plazas);
    }

    /**
     * Show the form for creating a new Asesor.
     */
    public function create()
    {
        $plazas = Plaza::all();
        return view('asesors.create')
            ->with('plazas', $plazas);
    }

    /**
     * Store a newly created Asesor in storage.
     */
    public function store(CreateAsesorRequest $request)
    {
        $request->validate([
            'nombre' => 'required',
            'image' => 'nullable',
            'plaza_id' => 'required',
            'activo' => 'required'
        ]);
        // dd($request);
        $asesor = new Asesor();
        $estatus = 1;

        $asesor->nombre = $request->nombre;
        $asesor->plaza_id = $request->plaza_id;
        $asesor->activo = $request->activo;

        if($request->hasFile('image')){
            $file = $request->file('image');
            $destiny = 'assets/asesores_imgs/';
            $old_name = str_replace(" ", "_", $request->nombre);
            $old_name = str_replace("-", "_", $request->nombre);
            $fileName = time().'_a_'.$old_name . '.' . $file->clientExtension();
            if($uploadSuccess = $request->file('image')->move($destiny, $fileName)){
                $asesor->image = $fileName;
            }else{
                $estatus = 2;
            }
        }
        
        $asesor->save();
        // $input = $request->all();

        // $asesor = $this->asesorRepository->create($input);
        $mensage = '';
        if($estatus == 1)
            $mensage = 'Asesor registrado correctamente';
        else if($estatus == 2)
            $mensage = 'Asesor registrado correctamente, sin embargo, ocurrió un error al intentar guardar la imagen.';
        Flash::success($mensage);

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
        $plazas = Plaza::all();

        if (empty($asesor)) {
            Flash::error('Asesor not found');

            return redirect(route('asesors.index'));
        }

        return view('asesors.edit')
            ->with('asesor', $asesor)
            ->with('plazas', $plazas);
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
