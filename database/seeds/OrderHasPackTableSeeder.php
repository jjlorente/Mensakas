<?php

use Illuminate\Database\Seeder;

class OrderHasPackTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(App\Order_has_pack::class, 50)->create();
    }
}
