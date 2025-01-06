<?php

namespace App\Repositories;

use App\Models\Cliente;
use App\Repositories\BaseRepository;

class ClienteRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'nombre',
        'n_contacto',
        'nss',
        'curp',
        'fecha_baja',
        'fecha_solicitud',
        'fecha_cobro',
        'afore',
        'monto',
        'estatus'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return Cliente::class;
    }
}
