<?php

namespace App\Http\Controllers;

use App\Card;
use App\MtgSet;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;

class CardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cards = Card::all()->sortBy('name');
        return view('cards.index', compact('cards'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cardValues =['name', 'sets', 'rarity', 'type', 'sub_type', 
            'converted_cost', 'power', 'toughness', 'price'];
        return view('cards.add', compact('cardValues'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $card = Card::create([
            'name' => $request['name'],
            'rules_text' => $request['rules_text'],
            'rarity' => $request['rarity'],
            'type' => $request['type'],
            'sub_type' => $request['sub_type'],
            'converted_cost' => $request['converted_cost'],
            'power' => $request['power'],
            'toughness' => $request['toughness'],
            'price' => $request['price']
        ]);
        $card->save();

        $image = $request->file('image');
        $fileName = $request['name'] . '.' . $image->getClientOriginalExtension();
        \Storage::disk('images')->putFileAs('', $image, $fileName);

        $this->attachSet($card, $request['sets']);


        return redirect('/cards/add');

    }

    private function attachSet($card, $setsRequest) {
        $setsRequest = str_replace(", ", ",", $setsRequest);
        $sets = explode(',', $setsRequest);
        $setIds = [];

        foreach($sets as $set) {
            if(! MtgSet::where('name', '=', $set)->exists())
                $newSet = MtgSet::create(['name' => $set]);
            $setIds[] = MtgSet::where('name', '=', $set)->first()->id;
        }
        $card->mtgSets()->attach($setIds);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Card  $card
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $card = Card::find($id);
        $sets = $card->mtgSets()->pluck('name');
        return view('cards.show', compact('card', 'sets'));

    }

    public function filter(Request $request) 
    {
        $set = $request['Set'];
        $cards = Card::where('id', '>', 0);
        $query = "";

        $query = $this->checkInclude($query, $request['Name'], "name");
        $query = $this->checkInclude($query, $request['Type'], "type");
        $query = $this->checkInclude($query, $request['Sub-Type'], "sub_type");
        $query = $this->checkInclude($query, $request['Rules_Text'], "rules_text");

        $query = $this->checkEquals($query, $request['Rarity'], "rarity");
        $query = $this->checkEquals($query, $request['Power'], "power");
        $query = $this->checkEquals($query, $request['Toughness'], "toughness");
        $query = substr($query, 0, -5);

        if($query != "")
            $cards = $cards->whereRaw($query);
        if($request['Set'] != NULL)
            $cards = Card::whereHas('mtgSets', function(Builder $query) use ($set) {
                $query->where('name', '=',$set);
            }, '>=', 1);
        $cards = $cards->get();

        return view('cards.index', compact('cards'));
    }

    private function checkInclude($query, $input, $attribute) {
        if($input != NULL)
            $query .= $attribute . " LIKE '%" . $input . "%' AND ";
        return $query;
    }
    private function checkEquals($query, $input, $attribute) {
        if($input != NULL)
            $query .= $attribute . " = '" . $input . "' AND ";
        return $query;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Card  $card
     * @return \Illuminate\Http\Response
     */
    public function edit(Card $card)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Card  $card
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Card $card)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Card  $card
     * @return \Illuminate\Http\Response
     */
    public function destroy(Card $card)
    {
        //
    }
}
