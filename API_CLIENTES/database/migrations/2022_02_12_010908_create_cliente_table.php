<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClienteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->uuid("id")->primary();
            $table->string("nombre",20);
            $table->string("apellidos",20);
            $table->string("documento_identidad",20);
            $table->string("numero_identidad",20);
            $table->string("pais",20);
            $table->string("Direccion",20);
            $table->string("Telefono",20);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cliente');
    }
}
