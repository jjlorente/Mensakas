<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product_has_category extends Model
{
    //
    protected $table = 'product_has_product_category';
    protected $fillable = ['fk_product_id','fk_product_category_id','created_at', 'updated_at',];

    protected $cascadeDeletes = ['projectTransactions'];

    public function product(){
      return $this->belongsTo('App\Product');
    }
    public function product_categories(){
      return $this->belongsTo('App\Product_categories');
    }
}
