<?php

use Illuminate\Database\Seeder;

class BusinessCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(App\Business_category::class, 50)->create();
    }
}
