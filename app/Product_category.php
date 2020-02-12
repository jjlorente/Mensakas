<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product_category extends Model
{
    //
    protected $table = 'product_categories';
    protected $primaryKey = 'product_categories_id';
    protected $fillable = ['name',];

    protected $cascadeDeletes = ['projectTransactions'];

    public function product_has_product_category() {
      return $this->hasOne('App\Product_has_product_category');
    }
}
