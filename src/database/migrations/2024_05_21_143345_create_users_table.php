<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create("users", function (Blueprint $table) {
            $table->id();
            $table->string("usuario");
            $table->string("email")->unique();
            $table->string("primerNombre");
            $table->string("segundoNombre");
            $table->string("primerApellido");
            $table->string("segundoApellido");
            $table->unsignedBigInteger("idDepartamento")->nullable();
            $table->unsignedBigInteger("idCargo")->nullable();

            $table->foreign('idDepartamento')->references('id')
            ->on('departments')
            ->onDelete('cascade');

            $table->foreign('idCargo')
            ->references('id')
            ->on('positions')
            ->onDelete('cascade');

            $table->timestamps();
        });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};