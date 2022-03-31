<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    public $incrementing = false;
    protected $primaryKey = "news_id";
    protected $fillable = ['news_id','id', 'title','content','list_path','notice_path','path','link_path'];
}
