<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prize extends Model
{
    //
    public $timestamps = false;
    protected $fillable = ['prizeName', 'qty'];

}
