<?php

namespace App\Http\Controllers;

use App\Models\Deck;
use App\Models\DeckProfile;
use App\Models\Profile;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DeckProfileController extends Controller
{
    /**
     * @group 04.Deck
     * Copy deck to other profile
     * 
     * @bodyParam profile_ids string required The profile that wanted to copy the deck to.
     * @response
     */
    public function store(Request $request, $deck_id)
    {
        $result = [];
        if (gettype($request->profile_ids) != 'array') $request['profile_ids'] = explode(',', $request->profile_ids);

        $deck = Deck::find($deck_id);
        foreach ($request->profile_ids as $prof_id) {
            $profile = Profile::find($prof_id);
            $validator_deck = Validator::make($deck->only(['name', 'image_path']), Deck::validation(null, $prof_id));
            if ($validator_deck->fails()) {
                $result['success'][$prof_id] = false;
            } else {
                $newdeck = $deck->replicate();
                $newdeck->is_global = false;
                $newdeck->deck_order = $profile->decks()->max('deck_order')+1;
                $newdeck->created_at = Carbon::now();
                $newdeck->updated_at = Carbon::now();
                $newdeck->profile_id = $profile->id;
                $newdeck->save();

                $card_ordering = 0;
                if (!$deck->cards) {
                    //no card in deck
                } else {
                    foreach ($deck->cards as $card) {
                        $card_ordering = $card_ordering + 1;
                        $newdeck->cards()->attach($card, ['card_order' => $card_ordering]);
                        $profile->cards()->sync($card);
                        $profile->save();
                        $newdeck->save();
                    }
                }
                $result['profile'][$prof_id] = $profile->name;
                $result['success'][$prof_id] = true;
            }
        }
        return response($result);
    }
}
