<?php

namespace App\Repositories;

use App\Models\Asesor;
use App\Repositories\BaseRepository;

class AsesorRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'nombre',
        'correo',
        'celular',
        'image',
        'email_verified_at',
        'password'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return Asesor::class;
    }
}
