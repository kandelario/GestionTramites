<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Asesor extends Model
{
    public $table = 'asesores';

    public $fillable = [
        'nombre',
        'correo',
        'celular',
        'image',
        'email_verified_at',
        'password'
    ];

    protected $casts = [
        'nombre' => 'string',
        'correo' => 'string',
        'celular' => 'string',
        'image' => 'string',
        'email_verified_at' => 'datetime',
        'password' => 'string'
    ];

    public static array $rules = [
        'nombre' => 'required|string|max:255',
        'correo' => 'nullable|string|max:255',
        'celular' => 'required|string|max:255',
        'image' => 'nullable|string|max:255',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    public function tramites(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(\App\Models\Tramite::class, 'asesor_id');
    }
}
