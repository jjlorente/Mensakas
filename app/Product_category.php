<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product_category extends Model
{
    //
    protected $table = 'product_categories';
    protected $primaryKey = 'product_category_id';
    protected $fillable = ['name',];

    protected $cascadeDeletes = ['projectTransactions'];

    public function product_has_category() {
      return $this->hasMany('App\Product_has_category','fk_product_category_id');
    }

    public function scopeBuscarpor($query, $tipo, $buscar) {
      if ( ($tipo) && ($buscar) ) {
        return $query->where($tipo,'like',"%$buscar%");
      }
    }
}
