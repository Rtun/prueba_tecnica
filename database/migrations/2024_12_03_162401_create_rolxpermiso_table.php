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
        Schema::create('rolxmodulo', function (Blueprint $table) {
            $table->unsignedBigInteger('idrol'); // Referencia al ID del rol
            $table->unsignedBigInteger('idmodulo'); // Referencia al ID del permiso

            $table->foreign('idrol')->references('idrol')->on('roles')->onDelete('cascade'); // Clave foránea
            $table->foreign('idmodulo')->references('idmodulo')->on('modulos')->onDelete('cascade');// Clave foránea
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rolxpermiso');
    }
};
