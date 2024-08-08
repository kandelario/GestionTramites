<?php

namespace App\Repositories;

use App\Models\Cliente;
use App\Repositories\BaseRepository;

class ClienteRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'nombre',
        'n_celular',
        'n_casa',
        'domicilio',
        'nss',
        'fecha_baja',
        'monto_asesor',
        'email_verified_at'
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
