<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductImgTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('product_img', function($tabla) 
        {
        	$tabla->increments('id');
        	$tabla->string('url_img', 255)->unique();
        	$tabla->string('desc', 100);
            $tabla->integer('product_id')->unsigned();
            $tabla->timestamps();
			
			$tabla->foreign('product_id')->references('id')->on('product');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('product_img');
	}

}
