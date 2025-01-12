<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tramite extends Model
{
    public $table = 'tramites';

    public $fillable = [
        'tramite',
        't_fecha_solicitud_recurso',
        't_fecha_pago',
        't_porcentaje',
        't_monto_para_asesor',
        't_estatus',
        'c_nombre',
        'c_contacto',
        'c_nss',
        'c_curp',
        'estatus_afore',
        'c_afore_fecha_baja',
        'c_afore',
        'c_monto',
        'asesor_id',
    ];

    protected $casts = [
        'tramite' => 'string',
        'estatus_afore' => 'string',
        'c_afore_fecha_baja' => 'date',
        't_fecha_solicitud_recurso' => 'date',
        't_fecha_pago' => 'date',
        't_monto_para_asesor' => 'float',
    ];

    public static array $rules = [
        'tramite' => 'required|string|max:255',
        'estatus_afore' => 'nullable|string|max:255',
        'fecha_baja' => 'nullable',
        't_fecha_solicitud_recurso' => 'nullable',
        't_fecha_pago' => 'nullable',
        't_porcentaje' => 'nullable',
        't_monto_para_asesor' => 'nullable|numeric',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'asesor_id' => 'required|string|max:255',
    ];

    public function cliente(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\Cliente::class, 'cliente_id');
    }

    // public function asesor(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    // {
    //     return $this->belongsTo(\App\Models\Asesore::class, 'asesor_id');
    // }
}
