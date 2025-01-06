<?php

namespace App\Repositories;

use App\Models\Plaza;
use App\Repositories\BaseRepository;

class PlazaRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'nombre',
        'activa'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return Plaza::class;
    }
}
