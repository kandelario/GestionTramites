<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    public $table = 'clientes';

    public $fillable = [
        'nombre',
        'n_celular',
        'n_casa',
        'domicilio',
        'nss',
        'fecha_baja',
    ];

    protected $casts = [
        'nombre' => 'string',
        'n_celular' => 'string',
        'n_casa' => 'string',
        'domicilio' => 'string',
        'nss' => 'string',
        'fecha_baja' => 'date',
        'monto_asesor' => 'float',
    ];

    public static array $rules = [
        'nombre' => 'required|string|max:255',
        'n_celular' => 'nullable|string|max:255',
        'n_casa' => 'nullable|string|max:255',
        'domicilio' => 'nullable|string|max:255',
        'nss' => 'nullable|string|max:255',
        'fecha_baja' => 'nullable',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    public function tramites(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(\App\Models\Tramite::class, 'cliente_id');
    }
}
