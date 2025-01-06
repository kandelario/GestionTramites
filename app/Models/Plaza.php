<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Plaza extends Model
{
    public $table = 'plazas';

    public $fillable = [
        'nombre',
        'activa'
    ];

    protected $casts = [
        'nombre' => 'string',
        'activa' => 'boolean'
    ];

    public static array $rules = [
        'nombre' => 'required|string|max:255',
        'activa' => 'required|boolean',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    public function tramites(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(\App\Models\Tramite::class, 'plaza_id');
    }
}
