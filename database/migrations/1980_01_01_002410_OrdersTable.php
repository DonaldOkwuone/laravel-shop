<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class OrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function(Blueprint $table){
			$table->increments('id');
			$table->timestamps();
			$table->integer('user_id'); 
            $table->string('name');
            $table->text('address');
            $table->text('cart');
            $table->string('payment_id');
			
		} );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('orders');
    }
}
