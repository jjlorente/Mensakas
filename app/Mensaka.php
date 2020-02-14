<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mensaka extends Model
{
    protected $table = 'mensakas';
    protected $primaryKey = 'mensaka_id';
    protected $fillable = ['first_name','last_name','status', 'phone','created_at','updated_at',];

    protected $cascadeDeletes = ['projectTransactions'];

    public function location_mensaka() {
      return $this->hasOne('App\Location_mensaka','fk_mensakas_id');
    }
    public function order_message() {
      return $this->hasOne('App\Order_message','fk_mensakas_id');
    }
}
