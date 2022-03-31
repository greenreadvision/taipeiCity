<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RouteInformation extends Model
{
    
    public function route() { return $this->belongsTo('App\Route', 'route_id', 'route_id'); }

    public $incrementing = false;
    protected $primaryKey = "route_information_id";
    protected $fillable = ['route_information_id','route_id','id', 'title','content'];
}
