<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PrizeResult extends Model
{
    public $timestamps = false;
    protected $fillable = ['nik', 'name', 'prizeName'];
}
