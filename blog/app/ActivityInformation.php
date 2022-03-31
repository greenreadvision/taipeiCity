<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ActivityInformation extends Model
{
    public function activity() { return $this->belongsTo('App\Activity', 'activity_id', 'activity_id'); }

    public $incrementing = false;
    protected $primaryKey = "activity_information_id";
    protected $fillable = ['activity_information_id','activity_id','introduction_cn', 'introduction_en','information','remind'];
}
