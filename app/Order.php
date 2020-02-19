<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';
    protected $primaryKey = 'order_id';
    protected $fillable = ['fk_consumers_id','status','description','created_at','updated_at'];
	  protected $cascadeDeletes = ['projectTransactions'];

    public function order_has_pack() {
      return $this->hasMany('App\Order_has_pack','fk_order_id');
    }
    public function order_has_product() {
      return $this->hasMany('App\Order_has_product','fk_order_id');
    }
    public function order_message() {
      return $this->hasOne('App\Order_message','fk_order_id');
    }
    public function payment() {
      return $this->hasOne('App\Payment','fk_order_id');
    }
    public function scopeBuscarpor($query, $tipo, $buscar) {
      if ( ($tipo) && ($buscar) ) {
        if (($tipo) == 'status') {
            if (($buscar)=='false') {
                return $query->where($tipo,'=',0);
            }
            return $query->where($tipo,'>',0);
        }
        return $query->where($tipo,'like',"%$buscar%");
      }
    }
}
