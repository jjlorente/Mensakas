<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Idiom extends Model
{
    //
    protected $table = 'idioms';
    protected $fillable = ['castellano','catalan','ingles','fk_product_id', 'created_at','updated_at',];

    protected $cascadeDeletes = ['projectTransactions'];

    public function product(){
      return $this->belongsTo('App\Product','fk_product_id');
    }
}
