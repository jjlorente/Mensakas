<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Business_category extends Model
{
    //
    protected $table = 'business_categories';
    protected $primaryKey = 'business_category_id';
    protected $fillable = ['name','fk_business_id','created_at', 'updated_at',];

    protected $cascadeDeletes = ['projectTransactions'];

    public function business(){
      return $this->belongsTo('App\Business','fk_business_id');
    }

    public function scopeBuscarpor($query, $tipo, $buscar) {
      if ( ($tipo) && ($buscar) ) {
        return $query->where($tipo,'like',"%$buscar%");
      }
    }
}
