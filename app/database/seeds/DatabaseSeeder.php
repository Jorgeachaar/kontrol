<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		$this->call('SizeTableSeeder');
		$this->call('CategoryTableSeeder');
	}

}


class SizeTableSeeder extends Seeder {

    public function run()
    {
        DB::table('size')->delete();
        
        Size::create(array('desc' => 'xs'));
        Size::create(array('desc' => 's'));
        Size::create(array('desc' => 'm'));
        Size::create(array('desc' => 'l'));
        Size::create(array('desc' => 'xl'));
    }

}

class CategoryTableSeeder extends Seeder {

    public function run()
    {
        DB::table('category')->delete();

        Category::create(array('desc' => 'Remeraas'));
        Category::create(array('desc' => 'Short'));
        Category::create(array('desc' => 'Bermudas'));
        Category::create(array('desc' => 'Buzos'));
        Category::create(array('desc' => 'Pantalones'));
    }
    
}