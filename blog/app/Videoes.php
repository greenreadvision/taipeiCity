<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Videoes extends Model
{
  
    public $incrementing = false;

    protected $fillable = ['id','url','content'];
}
