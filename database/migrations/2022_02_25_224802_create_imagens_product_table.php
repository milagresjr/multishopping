<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImagensProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('imagens_product', function (Blueprint $table) {
            $table->increments("id");
            $table->string("imagem",200);
            $table->integer("product_id")->unsigned();
            $table->timestamps();
            $table->foreign("product_id")->references("id")->on("products")->onDelete("cascade");

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('imagens_product');
    }
}
