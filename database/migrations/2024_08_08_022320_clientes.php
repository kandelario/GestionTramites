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
        Schema::create('clientes', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('n_contacto')->nullable();
            $table->string('nss')->nullable();
            $table->string('curp')->nullable();
            $table->date('fecha_baja')->nullable();
            $table->date('fecha_solicitud')->nullable();
            $table->date('fecha_cobro')->nullable();
            $table->string('afore')->nullable();
            $table->integer('monto')->default(0);
            $table->string('estatus')->default('pendiente');
            // $table->enum('estatus',['pagado','pendiente', 'completo'])->default('pendiente');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clientes');
    }
};
