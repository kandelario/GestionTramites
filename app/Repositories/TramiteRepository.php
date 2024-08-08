<?php

namespace App\Repositories;

use App\Models\Tramite;
use App\Repositories\BaseRepository;

class TramiteRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'tramite',
        'estatus_afore',
        'fecha_baja',
        'fecha_solicitud_recurso',
        'fecha_pago',
        'porcentaje',
        'monto_asesor',
        'email_verified_at',
        'asesor_id',
        'cliente_id'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return Tramite::class;
    }
}
