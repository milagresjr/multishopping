<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments("id");
            $table->string("nome",100);
            $table->decimal("preco",10,2);
            $table->string("descricao",200);
            $table->integer("quantidade");
            //$table->string("imagem",100);
            $table->integer("categoria_id")->unsigned();
            $table->integer("subcategoria_id")->unsigned();
            $table->timestamps();
            $table->foreign("categoria_id")->references("id")->on("categories")->onDelete("cascade");
            $table->foreign("subcategoria_id")->references("id")->on("sub_categories")->onDelete("cascade");

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
