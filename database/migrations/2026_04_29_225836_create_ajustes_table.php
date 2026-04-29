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
        Schema::create('ajustes', function (Blueprint $table) {
            $table->id();
            //informacion de la empresa
            $table->string('nombre_empresa');
            $table->string('descripcion_empresa')->nullable();
            $table->string('direccion_empresa');
            $table->string('telefono_empresa');
            $table->string('correo_empresa');
            $table->string('divisa_empresa');
            $table->string('logo_empresa')->nullable();
            $table->string('web_empresa')->nullable();

            //informacion financiera
            $table->decimal('interes', 5, 2)->default(10);
            $table->decimal('mora', 5, 2)->default(2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ajustes');
    }
};
