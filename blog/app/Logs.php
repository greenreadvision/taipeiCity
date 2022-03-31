<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Logs extends Model
{
    //
    public function user() { return $this->belongsTo('App\User', 'id', 'id'); }

    public $incrementing = false;
    protected $primaryKey = "id";
    protected $fillable = ['user_id','message'];
}
}
