<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mensaka extends Model
{
    protected $table = 'mensakas';
    protected $primaryKey = 'mensaka_id';
    protected $fillable = ['first_name','last_name','status', 'phone',];
	protected $cascadeDeletes = ['projectTransactions'];
}
