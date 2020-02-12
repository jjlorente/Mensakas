<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order_has_pack extends Model
{
    //
    protected $table = 'order_has_packs';
    protected $fillable = ['fk_order_id','fk_pack_id','created_at', 'updated_at',];

    protected $cascadeDeletes = ['projectTransactions'];

    public function Order(){
      return $this->belongsTo('App\Order');
    }

    public function Pack(){
      return $this->belongsTo('App\Pack');
    }
}
