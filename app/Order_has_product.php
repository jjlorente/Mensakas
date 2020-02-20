<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order_has_product extends Model
{
    //
    protected $table = 'order_has_products';
    protected $fillable = ['fk_order_id','fk_product_id','created_at', 'updated_at',];

    protected $cascadeDeletes = ['projectTransactions'];

    public function order(){
      return $this->belongsTo('App\Order','fk_order_id');
    }

    public function product(){
      return $this->belongsTo('App\Product','fk_product_id');
    }
}
