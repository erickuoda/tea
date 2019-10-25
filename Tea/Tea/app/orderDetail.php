<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class orderDetail extends Model
{
    protected $table = "order_detail";
    protected $primaryKey = 'ordID';
    public $timestamps = false;
}
