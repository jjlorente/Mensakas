<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    //
    protected $table = 'payments';
    protected $primaryKey = 'payment_id';
    protected $fillable = ['token','status','created_date','fk_order_id','created_at', 'updated_at',];

    protected $cascadeDeletes = ['projectTransactions'];

    public function order(){
      return $this->belongsTo('App\Order','fk_order_id');
    }
}
