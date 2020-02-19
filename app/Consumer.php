<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Iatstuti\Database\Support\CascadeSoftDeletes;

class Consumer extends Model
{
    //
    protected $table = 'consumers';
	  protected $primaryKey = 'consumer_id';
    protected $fillable = ['first_name','last_name','phone','mail', 'address','target','city',];

    protected $cascadeDeletes = ['projectTransactions'];

    public function order_deliver() {
      return $this->hasOne('App\Order_deliver','fk_consumers_id');
    }
    public function order() {
      return $this->hasMany('App\Order','fk_consumers_id');
    }

    public function scopeBuscarpor($query, $tipo, $buscar) {
      if ( ($tipo) && ($buscar) ) {
        return $query->where($tipo,'like',"%$buscar%");
      }
    }
}
