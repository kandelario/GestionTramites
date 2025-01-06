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
        // Schema::table('users', function (Blueprint $table) {
        //     $table->unsignedBigInteger('u_plaza_id');
        //     $table->foreign('u_plaza_id')->references('id')->on('plazas')->onUpdate('cascade');
        // });

        Schema::table('users', function (Blueprint $table) {
            $table->unsignedBigInteger('plaza_id_asignado')->nullable();
            $table->foreign('plaza_id_asignado')->references('id')->on('plazas')->onUpdate('cascade');
        });
    }
};
