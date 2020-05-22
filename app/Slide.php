<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slide extends Model
{
    protected $fillable = ['slider_image','slide_title','slide_description','status'];
}
