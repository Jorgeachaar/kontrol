<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('product', function($tabla) 
        {
        	$tabla->increments('id');
            $tabla->string('desc', 100)->unique();
            $tabla->string('desc2', 200);
            $tabla->string('desc3', 500);
            $tabla->decimal('price', 5, 2);
            $tabla->decimal('old_price', 5, 2);
			$tabla->integer('category_id')->unsigned();
            $tabla->timestamps();
			
			$tabla->foreign('category_id')->references('id')->on('category');
        });
        

	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('product');
	}

}
