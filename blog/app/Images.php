<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Images extends Model
{
    public function session() { return $this->belongsTo('App\Sessions', 'session_id', 'session_id'); }

    public $incrementing = false;
    protected $primaryKey = "image_id";
    protected $fillable = ['image_id','session_id', 'path','url'];
}
