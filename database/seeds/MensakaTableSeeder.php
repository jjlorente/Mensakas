<?php

use Illuminate\Database\Seeder;

class MensakaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(App\Mensaka::class, 50)->create();
    }
}
