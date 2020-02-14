<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order_message extends Model
{
    //
    protected $table = 'order_messages';
    protected $fillable = ['data','text','fk_order_id','fk_mensakas_id','fk_business_business_id','created_at', 'updated_at',];

    protected $cascadeDeletes = ['projectTransactions'];

    public function order(){
      return $this->belongsTo('App\Order','fk_order_id');
    }
    public function mensaka(){
      return $this->belongsTo('App\Mensaka','fk_mensakas_id');
    }
    public function business(){
      return $this->belongsTo('App\Business','fk_business_business_id');
    }
}
