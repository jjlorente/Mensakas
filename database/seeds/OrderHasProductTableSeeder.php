<?php

use Illuminate\Database\Seeder;

class OrderHasProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(App\Order_has_product::class, 50)->create();
    }
}
