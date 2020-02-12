<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('business', function(Blueprint $table) {
            
            $table->bigIncrements('business_id');
            $table->string('name', 100);
            $table->integer('phone')->length(9)->nullable();
            $table->string('mail', 100)->nullable();
            $table->string('adress', 150);
            $table->integer('zip_code')->length(5)->nullable();
            $table->boolean('status')->default(1);
            $table->decimal('lat', 14, 8)->nullable();
            $table->decimal('lon', 14, 8)->nullable();

            $table->timestamps();
        
        });

        Schema::create('mensakas', function(Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigIncrements('mensaka_id');
            $table->string('first_name', 45);
            $table->string('last_name', 100)->nullable();
            $table->boolean('status')->default(1);
            $table->integer('phone')->length(9);
            $table->timestamps();
        
        });


        Schema::create('consumers', function(Blueprint $table) {
             $table->engine = 'InnoDB';
            $table->bigIncrements('consumer_id');
            $table->string('first_name', 45);
            $table->string('last_name', 45)->nullable();
            $table->string('mail', 45)->nullable();
            $table->integer('phone')->length(9);
            $table->string('address', 45);
            $table->string('city', 45);
            $table->string('target', 45);
            $table->timestamps();
        
        });

        Schema::create('products', function(Blueprint $table) {
             $table->engine = 'InnoDB';
            $table->bigIncrements('product_id');
            $table->string('name', 100);
            $table->boolean('status')->default(1);
            $table->decimal('price', 5, 2);
            $table->string('description', 300)->nullable();

            $table->unsignedBigInteger('fk_business_id');
            $table->foreign('fk_business_id')->references('business_id')->on('business')->onDelete('cascade');
        
            $table->timestamps();
        
        });

        Schema::create('packs', function(Blueprint $table) {
             $table->engine = 'InnoDB';
            $table->bigIncrements('pack_id');
            $table->string('name', 100);
            $table->decimal('price', 5, 2);
            $table->boolean('status')->default(1);
            $table->string('description', 300)->nullable();

            $table->unsignedBigInteger('fk_business_id');
            $table->foreign('fk_business_id')->references('business_id')->on('business')->onDelete('cascade');
            $table->timestamps();
        
        });

        Schema::create('extras', function(Blueprint $table) {
             $table->engine = 'InnoDB';
            $table->bigIncrements('extra_id');
            $table->string('name', 100);
            $table->decimal('price', 5, 2);
            $table->string('description', 300);
            $table->timestamps();
        });

        Schema::create('business_categories', function(Blueprint $table) {
             $table->engine = 'InnoDB';
            $table->bigIncrements('business_category_id');
            $table->string('name', 100);
            $table->unsignedBigInteger('fk_business_id');
            $table->foreign('fk_business_id')->references('business_id')->on('business')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('product_categories', function(Blueprint $table) {
             $table->engine = 'InnoDB';
            $table->bigIncrements('product_category_id');
            $table->string('name', 100);
            $table->timestamps();
        
        });

        Schema::create('product_has_product_category', function(Blueprint $table) {
            $table->engine = 'InnoDB';
                  
            $table->unsignedBigInteger('fk_product_id')->unsigned();
            $table->unsignedBigInteger('fk_product_category_id')->unsigned();
            $table->timestamps();
            $table->foreign('fk_product_id')->references('product_id')->on('products')->onDelete('cascade');
            $table->foreign('fk_product_category_id')->references('product_category_id')->on('product_categories')->onDelete('cascade');
        });

        Schema::create('idioms', function(Blueprint $table) {
             $table->engine = 'InnoDB';
            $table->text('castellano');
            $table->text('catalan')->nullable();
            $table->text('ingles')->nullable();

            $table->unsignedBigInteger('fk_product_id');

            $table->foreign('fk_product_id')->references('product_id')->on('products')->onDelete('cascade');
            
        
            $table->timestamps();
        
        });

        Schema::create('orders', function(Blueprint $table) {
             $table->engine = 'InnoDB';
            $table->bigIncrements('order_id');
            $table->json('json')->nullable();
            $table->boolean('status')->default(1);
            $table->string('description', 300)->nullable();

            $table->unsignedBigInteger('fk_consumers_id');
            $table->foreign('fk_consumers_id')->references('consumer_id')->on('consumers')->onDelete('cascade');
        
            $table->timestamps();
        
        });

        Schema::create('order_has_products', function(Blueprint $table) {

             $table->engine = 'InnoDB';
            $table->unsignedBigInteger('fk_order_id');
            $table->foreign('fk_order_id')->references('order_id')->on('orders');

            $table->unsignedBigInteger('fk_product_id');
            $table->foreign('fk_product_id')->references('product_id')->on('products')->onDelete('cascade');
            $table->timestamps();
        
        });

        Schema::create('order_has_packs', function(Blueprint $table) {
             $table->engine = 'InnoDB';

            $table->unsignedBigInteger('fk_order_id');
            $table->foreign('fk_order_id')->references('order_id')->on('orders')->onDelete('cascade');

            $table->unsignedBigInteger('fk_pack_id');
            $table->foreign('fk_pack_id')->references('pack_id')->on('packs')->onDelete('cascade');
            $table->timestamps();
        
        });

        Schema::create('payments', function(Blueprint $table) {
             $table->engine = 'InnoDB';
            $table->bigIncrements('payment_id');
            $table->string('token', 45);
            $table->boolean('status');
            $table->date('created_date');
            $table->unsignedBigInteger('fk_order_id');
        
            $table->foreign('fk_order_id')->references('order_id')->on('orders')->onDelete('cascade');
    
            $table->timestamps();
        
        });
        Schema::create('invoices', function(Blueprint $table) {
             $table->engine = 'InnoDB';
            $table->bigIncrements('invoice_id');
            $table->string('name', 100);
            $table->dateTime('date');
            $table->unsignedBigInteger('fk_order_id');
            $table->foreign('fk_order_id')->references('order_id')->on('orders')->onDelete('cascade');
        
            $table->timestamps();
        
        });

        Schema::create('locations_mensakas', function(Blueprint $table) {
             $table->engine = 'InnoDB';
            $table->bigIncrements('location_mensaka_id');
            $table->decimal('lat', 11, 8);
            $table->decimal('lon', 11, 8);

            $table->unsignedBigInteger('fk_mensakas_id');
            $table->foreign('fk_mensakas_id')->references('mensaka_id')->on('mensakas')->onDelete('cascade');
        
            $table->timestamps();
        
        });

        Schema::create('business_timetables', function(Blueprint $table) {
             $table->engine = 'InnoDB';
            $table->unsignedBigInteger('fk_business_id');
            $table->integer('day')->length(1);
            $table->string('description',100)->nullable();
            $table->time('open');
            $table->time('close');
            $table->foreign('fk_business_id')->references('business_id')->on('business')->onDelete('cascade');
        
            $table->timestamps();
        
        });

        Schema::create('extra_has_product', function(Blueprint $table) {
             $table->engine = 'InnoDB';
            $table->unsignedBigInteger('fk_extra_id');
            $table->unsignedBigInteger('fk_product_id');
        
            $table->foreign('fk_extra_id')->references('extra_id')->on('extras')->onDelete('cascade');
        
            $table->foreign('fk_product_id')->references('product_id')->on('products')->onDelete('cascade');
        
            $table->timestamps();
        
        });


        Schema::create('order_messages', function(Blueprint $table) {
             $table->engine = 'InnoDB';
            $table->date('data');
            $table->text('text')->nullable();
            $table->unsignedBigInteger('fk_order_id');
            $table->unsignedBigInteger('fk_mensakas_id');
            $table->unsignedBigInteger('fk_business_business_id');
            
            $table->foreign('fk_order_id')->references('order_id')->on('orders')->onDelete('cascade');
            $table->foreign('fk_mensakas_id')->references('mensaka_id')->on('mensakas')->onDelete('cascade');
            $table->foreign('fk_business_business_id')->references('business_id')->on('business')->onDelete('cascade');
        
            $table->timestamps();
        
        });


        Schema::create('order_delivers', function(Blueprint $table) {
             $table->engine = 'InnoDB';
            $table->boolean('status');
            $table->unsignedBigInteger('fk_order_order_id');
            $table->unsignedBigInteger('fk_mensaka_mensakas_id');

            $table->foreign('fk_order_order_id')->references('order_id')->on('orders')->onDelete('cascade');
            $table->foreign('fk_mensaka_mensakas_id')->references('mensaka_id')->on('mensakas')->onDelete('cascade');
        
            $table->timestamps();
        
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {


    }
}
