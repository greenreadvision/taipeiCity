<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    public function activityInformation() { return $this->hasmany('App\ActivityInformation', 'activity_id', 'activity_id'); }
    public function routes() { return $this->hasmany('App\Route', 'activity_id', 'activity_id')->orderby('id'); }

    public $incrementing = false;
    protected $primaryKey = "activity_id";

    protected $fillable = ['activity_id','id', 'name','open_date','state'];
}
