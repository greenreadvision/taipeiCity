<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sessions extends Model
{
    public function route() { return $this->belongsTo('App\Route', 'route_id', 'route_id'); }
    public function images() { return $this->hasmany('App\Images', 'session_id', 'session_id'); }
    
    public $incrementing = false;
    protected $primaryKey = "session_id";
    protected $fillable = ['session_id','route_id', 'type','teacher','session','date','state','start_time','end_time'];
}
