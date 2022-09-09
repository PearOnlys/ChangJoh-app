<?php

namespace App\Http\Controllers;

use App\Models\Deck;
use Illuminate\Http\Request;

class CardDeckController extends Controller
{
    public function index($id)
    {
        return response(Deck::find($id)->cards()->get());
    }

    public function store(Request $request, $id)
    {
        $deck = Deck::find($id);
        $cards = explode(',',$request->cards);
        foreach ($cards as $card){
            var_dump($card);
            $deck->cards()->sync($card, false);
        }
        return response("Deck");
    }
}
