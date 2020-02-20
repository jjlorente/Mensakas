<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Extra_has_product extends Model
{
    protected $table = 'extra_has_product';
    protected $fillable = ['fk_extra_id','fk_product_id','created_at', 'updated_at',];

    protected $cascadeDeletes = ['projectTransactions'];

    public function extra(){
      return $this->belongsTo('App\Extra','fk_extra_id');
    }

    public function product(){
      return $this->belongsTo('App\product','fk_product_id');
    }
}
