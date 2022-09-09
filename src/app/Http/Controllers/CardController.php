<?php

namespace App\Http\Controllers;

use App\Models\Card;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CardController extends Controller
{
    public function index()
    {
        $cards = Card::orderBy('name', 'asc')->get();
        return response($cards);
    }
    public function show($id)
    {
        $card = Card::findOrFail($id);
        return response($card);
    }
    public function create(Request $request)
    {
        $valiadtor = Validator::make($request->all(), Card::$rulesNew);
        if($valiadtor->fails()){
            dd($valiadtor);
        } else {
            $request->file('image')->store('image', 'public');
            $card = new Card();
            if ($request->file('image')) {
                $file = $request->file('image');
                $filename = date('YmdHi') . $file->getClientOriginalName();
                $file->move(public_path(('public/Images')), $filename);
                $card['image'] = $filename;
            }
            $card->fill($request->only(['word']));
            $card->save();
        }
        return response($card);
    }
    public function edit(Request $request, $id)
    {
        $valiadtor = Validator::make($request->all(), Card::$rulesNew);
        if ($valiadtor->fails()) {
            dd($request);
        } else {
            $card = Card::find($id);
            $card->fill($request->only(['word', 'image']));
            $card->save();
        }
        return response($card);
    }
    public function destroy($id)
    {
        Card::find($id)->delete();
        return response("Gone");
    }
}
