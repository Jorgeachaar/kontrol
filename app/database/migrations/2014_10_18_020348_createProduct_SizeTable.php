<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductSizeTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('product_size', function($tabla) 
        {
        	$tabla->increments('id');
			$tabla->integer('product_id')->unsigned();
			$tabla->integer('size_id')->unsigned();
            $tabla->timestamps();
			
			$tabla->foreign('product_id')->references('id')->on('product');
			$tabla->foreign('size_id')->references('id')->on('size');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('product_size');
	}

}
