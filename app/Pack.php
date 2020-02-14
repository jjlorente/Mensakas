<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pack extends Model
{
    //
    protected $table = 'packs';
    protected $primaryKey = 'pack_id';
    protected $fillable = ['name','price','status', 'description','fk_business_id','created_at','updated_at',];

    protected $cascadeDeletes = ['projectTransactions'];

    public function business(){
      return $this->belongsTo('App\Business','fk_business_id');
    }
}
