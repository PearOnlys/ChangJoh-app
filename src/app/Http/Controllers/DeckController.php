<?php

namespace App\Http\Controllers;

use App\Models\Card;
use App\Models\Deck;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DeckController extends Controller
{
    public function index()
    {
        $decks = Deck::orderBy('name','asc')->get();
        return response($decks);
    }
    public function show($id)
    {
        $deck = Deck::findOrFail($id)->get();
        return response($deck);
    }
    public function create(Request $request)
    {
        $valiadtor = Validator::make($request->all(), Deck::$rulesNew);
        if ($valiadtor->fails()) {
            dd($request);
        } else {
            $deck = new Deck();
            $deck->fill($request->only(['name']));
            $deck->save();
        }
        return response($deck);
    }
}
