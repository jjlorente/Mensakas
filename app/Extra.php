<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Extra extends Model
{
    //
    protected $table = 'extras';
	protected $primaryKey = 'extra_id';
    protected $fillable = ['name','price','description',];
}
