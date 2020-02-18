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
      return $this->hasOne('App\Product_has_product_category','fk_product_category_id');
    }

    public function scopeBuscarpor($query, $tipo, $buscar) {
      if ( ($tipo) && ($buscar) ) {
        return $query->where($tipo,'like',"%$buscar%");
      }
    }
}
