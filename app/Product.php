<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $table = 'products';
    protected $primaryKey = 'product_id';
    protected $fillable = ['name','status','price','description','fk_business_id','created_at', 'updated_at',];

    protected $cascadeDeletes = ['projectTransactions'];

    public function business(){
      return $this->belongsTo('App\Business','fk_business_id');
    }

    public function product_has_product_category() {
      return $this->hasOne('App\Product_has_product_category','fk_product_id');
    }


    public function scopeBuscarpor($query, $tipo, $buscar) {
      if ( ($tipo) && ($buscar) ) {
        if (($tipo) == 'status') {
            if (($buscar)=='false') {
                return $query->where($tipo,'=',0);
            }
            return $query->where($tipo,'=',1);
        }
        return $query->where($tipo,'like',"%$buscar%");
      }
    }
}
