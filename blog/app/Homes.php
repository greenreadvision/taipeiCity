<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Homes extends Model
{
  
    public $incrementing = false;

    protected $fillable = ['id','name','introduction_cn','introduction_en','logo_path', 'path','navbar_path','footer_path','host_path','navbar_color','navbar_color_hover','a_color','a_color_hover','footer_color','footer_color_hover'];
}
