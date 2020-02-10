<?php

use Illuminate\Database\Seeder;

class ProductHasCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(App\Product_has_category::class, 50)->create();
    }
}
