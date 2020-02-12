<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    //
    protected $table = 'invoices';
	  protected $primaryKey = 'invoice_id';
    protected $fillable = ['name','date','fk_order_id','created_at', 'updated_at',];

    protected $cascadeDeletes = ['projectTransactions'];

    public function order(){
      return $this->belongsTo('App\Order');
    }
}
