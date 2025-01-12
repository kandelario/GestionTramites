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
            // datos correpondientes al trámite
            $table->id();
            $table->string('tramite');
            $table->date('t_fecha_solicitud_recurso')->nullable();
            $table->date('t_fecha_pago')->nullable();
            $table->integer('t_porcentaje')->nullable();
            $table->float('t_monto_para_asesor')->nullable();
            $table->string('t_estatus')->default('pendiente');
            

            // sección de datos para registro del cliente
            $table->string('c_nombre');
            $table->string('c_contacto')->nullable();
            $table->string('c_nss')->nullable();
            $table->string('c_curp')->nullable();
            $table->string('estatus_afore')->nullable();
            $table->date('c_afore_fecha_baja')->nullable();
            $table->string('c_afore')->nullable();
            $table->integer('c_monto')->default(0);
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
