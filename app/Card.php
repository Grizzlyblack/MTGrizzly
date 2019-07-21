<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    protected $fillable=['name', 'rules_text', 'set_name', 'rarity', 'type', 
    	'sub_type', 'converted_cost', 'power', 'toughness', 'price', 'image'];

    public function mtgSets() {
    	return $this->belongsToMany('App\MtgSet');
    }
}
