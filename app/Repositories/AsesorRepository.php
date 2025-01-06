<?php

namespace App\Repositories;

use App\Models\Asesor;
use App\Repositories\BaseRepository;

class AsesorRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'nombre',
        'activo',
        'image',
        'email_verified_at',
        'plaza_id'
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
