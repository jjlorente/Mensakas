<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location_mensaka extends Model
{
    //
    protected $table = 'locations_mensaka';
    protected $primaryKey = 'locations_mensaka_id';
    protected $fillable = ['lat','lon','fk_mensakas_id','created_at','updated_at',];

    protected $cascadeDeletes = ['projectTransactions'];

    public function mensakas(){
      return $this->belongsTo('App\Mensaka');
    }
}
