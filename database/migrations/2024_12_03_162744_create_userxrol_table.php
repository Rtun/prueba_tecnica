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
        Schema::create('userxrol', function (Blueprint $table) {
            $table->unsignedBigInteger('idusuario'); // Referencia al ID del usuario
            $table->unsignedBigInteger('idrol'); // Referencia al ID del rol

            $table->foreign('idusuario')->references('id')->on('users')->onDelete('cascade'); // Clave foránea
            $table->foreign('idrol')->references('idrol')->on('roles')->onDelete('cascade');// Clave foránea
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('userxrol');
    }
};
