<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnderecosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enderecos', function (Blueprint $table) {
            $table->increments("id");
            $table->string("provincia",100);
            $table->string("municipio",100);
            $table->string("bairro",100);
            $table->string("rua",100);
            $table->string("casa",100);
            $table->string("referencia",100);
            $table->integer("client_id")->unsigned();

            $table->timestamps();

            $table->foreign("client_id")->references("id")->on("clients")->onDelete("cascade");

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('enderecos');
    }
}
