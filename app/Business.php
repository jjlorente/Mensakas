<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Business extends Model
{
    //
    protected $table = 'business';
    protected $primaryKey = 'business_id';
    protected $fillable = ['name','phone','mail', 'adress','zip_code','status','lat','lon',];

    protected $cascadeDeletes = ['projectTransactions'];

    public function business_categories() {
      return $this->hasOne('App\Business_category','fk_business_id');
    }
    public function business_timetables() {
      return $this->hasMany('App\Business_timetable','fk_business_id');
    }
    public function order_messages() {
      return $this->hasOne('App\Order_message','fk_business_id');
    }
    public function packs() {
      return $this->hasOne('App\Pack','fk_business_id');
    }
    public function products() {
      return $this->hasMany('App\Product','fk_business_id');
    }

    public function scopeBuscarpor($query, $tipo, $buscar) {
      if ( ($tipo) && ($buscar) ) {
        return $query->where($tipo,'like',"%$buscar%");
      }
    }
}
