<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLivrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('livros', function (Blueprint $table) {
            $table->increments("id");
            $table->integer("category_id")->unsigned();
            $table->string("titulo");
            $table->string("autor");
            $table->text("descricao");
            $table->string("imagem_capa");
            $table->timestamps();
            $table->foreign("category_id")->references("id")->on("category_livros")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('livros');
    }
}
