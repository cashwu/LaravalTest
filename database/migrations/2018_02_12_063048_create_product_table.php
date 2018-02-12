<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product', function (Blueprint $table) {
            $table->increments('id');
            $table->string("status", 1)->default("C")->index("status_idx"); // C (Create) 建立中， S (Sell) 可販售
            $table->string("name", 80)->nullable();
            $table->string("name_en", 80)->nullable();
            $table->text("description");
            $table->text("description_en");
            $table->string("photo", 50)->nullable();
            $table->integer("price")->default(0);
            $table->integer("count")->default(0);
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
        Schema::dropIfExists('product');
    }
}
