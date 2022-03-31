<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Route extends Model
{
    
    public function activity() { return $this->belongsTo('App\Activity', 'activity_id', 'activity_id'); }
    public function sessions() { return $this->hasmany('App\Sessions', 'route_id', 'route_id')->orderby('session'); }
    public function informations() { return $this->hasmany('App\RouteInformation', 'route_id', 'route_id')->orderby('id'); }

    public $incrementing = false;
    protected $primaryKey = "route_id";
    protected $fillable = ['route_id','activity_id','introduction_cn', 'id','name','class','person','start_location','end_location','service','routes','state','url','introduction','session_information'];
}
