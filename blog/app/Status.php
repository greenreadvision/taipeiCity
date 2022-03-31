<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    
    public $incrementing = false;
    protected $primaryKey = "id";
    protected $fillable = ['status'];
}
