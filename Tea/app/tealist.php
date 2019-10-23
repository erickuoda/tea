<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tealist extends Model
{
    protected $table = "tealist";
    protected $primaryKey = 'teaID';
    public $timestamps = false; 
}
