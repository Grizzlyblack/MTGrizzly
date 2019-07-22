<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Card;
use App\MtgSet;

class PageController extends Controller
{
    public function index() {
        
    	$cards= Card::latest()->limit(6)->get();

    	return view('home', compact('cards'));
    }

    public function search() {

    	$cardValues =['Name', 'Rarity', 'Type', 'Sub-Type', 
            'Converted Cost', 'Power', 'Toughness'];
        $sets = MtgSet::orderBy('name')->pluck('name');
    	return view('search', compact('cardValues', 'sets'));
    }
}
