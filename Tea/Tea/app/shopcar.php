<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class shopcar extends Model
{
    protected $table = "shopcar";
    protected $primaryKey = 'shopNumber';
    public $timestamps = false; 
}
