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

    public function business_category() {
      return $this->hasOne('App\Business_categories');
    }
    public function order_message() {
      return $this->hasOne('App\Order_messages');
    }
    public function pack() {
      return $this->hasOne('App\Packs');
    }
    public function product() {
      return $this->hasOne('App\Products');
    }
}
