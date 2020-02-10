<?php

use Illuminate\Database\Seeder;

class PackTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(App\Pack::class, 50)->create();
    }
}
