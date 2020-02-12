<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order_deliver extends Model
{
    //
     protected $table = 'order_delivers';
     protected $primaryKey = 'order_id';
     protected $fillable = ['json','status','description','fk_consumers_id','created_at', 'updated_at',];

     protected $cascadeDeletes = ['projectTransactions'];

     public function consumers(){
       return $this->belongsTo('App\Consumer');
     }
}
