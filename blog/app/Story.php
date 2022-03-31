<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Story extends Model
{
    public $incrementing = false;
    protected $primaryKey = "story_id";
    protected $fillable = ['story_id','id','content', 'path','tag'];
}
