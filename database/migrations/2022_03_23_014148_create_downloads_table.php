<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDownloadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('downloads', function (Blueprint $table) {
            $table->increments("id");
            $table->integer("client_id")->unsigned();
            $table->integer("livro_id")->unsigned();

            $table->timestamps();
            $table->foreign("client_id")->references("id")->on("clients")->onDelete("cascade");
            $table->foreign("livro_id")->references("id")->on("livros")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('downloads');
    }
}
