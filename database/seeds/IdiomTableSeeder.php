<?php

use Illuminate\Database\Seeder;

class IdiomTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(App\Idiom::class, 50)->create();
    }
}
