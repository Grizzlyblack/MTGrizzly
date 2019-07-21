<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MtgSet extends Model
{
	protected $fillable=['name'];
    public function cards() {
    	return $this->belongsToMany('App\Card');
    }
}
