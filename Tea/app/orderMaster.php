<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class orderMaster extends Model
{
    protected $table = "order_master";
    protected $primaryKey = 'orderID';
    public $timestamps = false; 
}
