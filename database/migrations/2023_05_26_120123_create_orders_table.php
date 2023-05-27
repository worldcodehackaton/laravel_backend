<?php

use App\Models\Order;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('store_id')/*->constrained()*/;
            $table->foreignId('client_id')->constrained('users');
            $table->foreignId('product_id')/*->constrained()*/;
            $table->integer('count')->nullable();
            $table->double('weight')->nullable();
            $table->enum('status', Order::$statuses);
            $table->dateTime('delivered_at');
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
        Schema::dropIfExists('orders');
    }
}
