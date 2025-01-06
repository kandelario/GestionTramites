<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    public $table = 'clientes';

    public $fillable = [
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

    protected $casts = [
        'nombre' => 'string',
        'n_contacto' => 'string',
        'nss' => 'string',
        'curp' => 'string',
        'fecha_baja' => 'date',
        'fecha_solicitud' => 'date',
        'fecha_cobro' => 'date',
        'afore' => 'string',
        'estatus' => 'string'
    ];

    public static array $rules = [
        'nombre' => 'required|string|max:255',
        'n_contacto' => 'nullable|string|max:255',
        'nss' => 'nullable|string|max:255',
        'curp' => 'nullable|string|max:255',
        'fecha_baja' => 'nullable',
        'fecha_solicitud' => 'nullable',
        'fecha_cobro' => 'nullable',
        'afore' => 'nullable|string|max:255',
        'monto' => 'required',
        'estatus' => 'required|string|max:255',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    public function tramites(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(\App\Models\Tramite::class, 'cliente_id');
    }
}
