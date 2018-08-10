<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Translit;

class Product extends Model
{
   	public function category(){
    	return $this->belongsTo('App\Category', 'category_id');
    }
    public function manufacture(){
    	return $this->belongsTo('App\Manufacture', 'manufacture_id');
    }
    public function country(){
    	return $this->belongsTo('App\Country', 'country_id');
    }
     public function setSlugAttribute($value){
    	$this->attributes['slug'] = $value==''?Translit::makeUrlCode($this->attributes['name']):Translit::makeUrlCode($value);
    }
}
