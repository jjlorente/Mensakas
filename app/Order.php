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
      return $this->hasMany('App\Order_has_pack');
    }
    public function order_has_product() {
      return $this->hasMany('App\Order_has_product');
    }
    public function order_message() {
      return $this->hasOne('App\Order_message');
    }
    public function payment() {
      return $this->hasOne('App\Payment');
    }
}
