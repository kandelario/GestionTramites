<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tramite extends Model
{
    public $table = 'tramites';

    public $fillable = [
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

    protected $casts = [
        'tramite' => 'string',
        'estatus_afore' => 'string',
        'fecha_baja' => 'date',
        'fecha_solicitud_recurso' => 'date',
        'fecha_pago' => 'date',
        'monto_asesor' => 'float',
        'email_verified_at' => 'datetime'
    ];

    public static array $rules = [
        'tramite' => 'required|string|max:255',
        'estatus_afore' => 'nullable|string|max:255',
        'fecha_baja' => 'nullable',
        'fecha_solicitud_recurso' => 'nullable',
        'fecha_pago' => 'nullable',
        'porcentaje' => 'nullable',
        'monto_asesor' => 'nullable|numeric',
        'email_verified_at' => 'nullable',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'asesor_id' => 'required',
        'cliente_id' => 'required'
    ];

    public function cliente(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\Cliente::class, 'cliente_id');
    }

    public function asesor(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\Asesore::class, 'asesor_id');
    }
}
