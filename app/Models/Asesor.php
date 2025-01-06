<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Asesor extends Model
{
    public $table = 'asesores';

    public $fillable = [
        'nombre',
        'activo',
        'image',
        // 'email_verified_at',
        'plaza_id'
    ];

    protected $casts = [
        'nombre' => 'string',
        'activo' => 'boolean',
        'image' => 'string',
        // 'email_verified_at' => 'datetime'
    ];

    public static array $rules = [
        'nombre' => 'required|string|max:255',
        'activo' => 'required|boolean',
        'image' => 'nullable',
        // 'email_verified_at' => 'nullable',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'plaza_id' => 'required'
    ];

    public function plaza(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\Plaza::class, 'plaza_id');
    }

    public function tramites(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(\App\Models\Tramite::class, 'asesor_id');
    }
}
