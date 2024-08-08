<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tramites', function (Blueprint $table) {
            $table->id();
            $table->string('tramite');
            $table->string('estatus_afore')->nullable();
            $table->date('fecha_baja')->nullable();
            $table->date('fecha_solicitud_recurso')->nullable();
            $table->date('fecha_pago')->nullable();
            $table->integer('porcentaje')->nullable();
            $table->float('monto_asesor')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tramites');
    }
};
