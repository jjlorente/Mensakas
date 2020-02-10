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
}
