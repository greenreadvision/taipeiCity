<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SignUpInformation extends Model
{
    public $incrementing = false;

    protected $fillable = ['number', 'type', 'content'];
}
