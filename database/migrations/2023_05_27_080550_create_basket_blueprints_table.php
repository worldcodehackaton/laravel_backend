<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBasketBlueprintsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('basket_blueprints', function (Blueprint $table) {
            $table->id();
            $table->foreignId('client_id');
            $table->foreignId('product_id');
            $table->foreignId('store_id');
            $table->integer('count')->nullable();
            $table->double('weight')->nullable();
            $table->dateTime('order_at');
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
        Schema::dropIfExists('basket_blueprints');
    }
}
