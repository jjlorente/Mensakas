<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product_has_category extends Model
{
    //
    protected $table = 'product_has_product_category';
    protected $fillable = ['fk_product_id','fk_product_category_id','created_at', 'updated_at',];

    protected $cascadeDeletes = ['projectTransactions'];

    public function has_product(){
      return $this->belongsToMany('App\Product','fk_product_id');
    }
    public function has_product_categories(){
      return $this->belongsToMany('App\Product_category','fk_product_category_id');
    }

    public function scopeBuscarpor($query, $tipo, $buscar) {
      if ( ($tipo) && ($buscar) ) {
        return $query->where($tipo,'like',"%$buscar%");
      }
    }
}
