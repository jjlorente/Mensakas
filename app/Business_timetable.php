<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Business_timetable extends Model
{
    //
    protected $table = 'business_timetables';
    protected $fillable = ['fk_business_id','day','description','open','close',];
    protected $cascadeDeletes = ['projectTransactions'];

    public function business(){
      return $this->belongsTo('App\Business');
    }
}
