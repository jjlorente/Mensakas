<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserTableSeeder::class);
        $this->call(BusinessTableSeeder::class);
        $this->call(ConsumerTableSeeder::class);
        $this->call(PackTableSeeder::class);
        $this->call(BusinessCategoryTableSeeder::class);
        $this->call(ProductTableSeeder::class);
        $this->call(ProductCategoryTableSeeder::class);
        $this->call(ProductHasCategoryTableSeeder::class);
        $this->call(IdiomTableSeeder::class);
        $this->call(OrderTableSeeder::class);
        $this->call(OrderHasPackTableSeeder::class);
        $this->call(OrderHasProductTableSeeder::class);
        $this->call(MensakaTableSeeder::class);
        $this->call(PaymentTableSeeder::class);
        $this->call(InvoiceTableSeeder::class);
    }
}
