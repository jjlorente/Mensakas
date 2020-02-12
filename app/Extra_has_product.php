<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Extra_has_product extends Model
{
    protected $table = 'extra_has_product';
    protected $fillable = ['fk_extra_id','fk_product_id','created_at', 'updated_at',];

    protected $cascadeDeletes = ['projectTransactions'];

    public function extra(){
      return $this->belongsTo('App\Extra');
    }

    public function product(){
      return $this->belongsTo('App\product');
    }
}
