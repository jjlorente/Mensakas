<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Iatstuti\Database\Support\CascadeSoftDeletes;

class Consumer extends Model
{
    //
    protected $table = 'consumers';
	protected $primaryKey = 'consumer_id';
    protected $fillable = ['first_name','last_name','phone','mail', 'address','target','city',];



    protected $cascadeDeletes = ['projectTransactions'];
}
