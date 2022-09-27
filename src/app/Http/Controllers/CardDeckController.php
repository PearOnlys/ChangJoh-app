<?php

namespace App\Http\Controllers;

use App\Models\Card;
use App\Models\Deck;
use App\Models\Profile;
use Illuminate\Http\Request;

use function GuzzleHttp\Promise\each;

class CardDeckController extends Controller
{
    /**
     * @group 05.Card
     * Show all card of a deck that were unhidden
     * 
     * @response {
     *    "cards": [
     *        {
     *            "card_id": 8,
     *            "word": "voluptatem",
     *            "image_path": null,
     *            "audio_path": null,
     *        }
     *    ],
     *    "success": true
     * }
     */
    public function index_show($deck)
    {
        $result = [];
        $ordered = [];
        $queue = [];
        $deck = Deck::findOrFail($deck);
        $profile = $deck->profile()->get()->last();
        $ordered = $deck->cards()->wherePivot('card_order', '!=', null)->orderBy('card_order', 'asc')->get();
        $queue = $deck->cards()->wherePivot('card_order', '=', null)->orderBy('id', 'asc')->get();

        if (count($ordered) == 0) {
            $reorder = 0;
        } else {
            $reorder = $ordered->last()->pivot->card_order;
        }
        foreach ($queue as $que) {
            $reorder = $reorder + 1;
            $que->pivot->card_order = $reorder;
            $que->pivot->save();
        }
        
        foreach ($deck->cards()->wherePivot('is_hidden', '=', false)->orderBy('card_order', 'asc')->get() as $card) {
            $image = null;
            $audio = null;
            $image = $card->profiles()->where('profile_id','=',$profile->id)->get()->last()->pivot->image_path;
            $audio = $card->profiles()->where('profile_id','=',$profile->id)->get()->last()->pivot->audio_path;
            if ($image) $card['image_path'] = $image;
            if ($audio) $card['audio_path'] = $audio;
            $result['cards'][] = array(
                "card_id" => $card->id,
                'word' => $card->word,
                'image_path' => $card->image_path,
                'audio_path' => $card->audio_path
            );
        }
        $result['success'] = true;
        return response($result);
    }
    /**
     * @group 05.Card
     * Show all card of a deck, even hidden
     * @response {
     *    "cards": [
     *        {
     *            "card_id": 8,
     *            "word": "voluptatem",
     *            "image_path": null,
     *            "audio_path": null,
     *        },
     *        {
     *            "card_id": 6,
     *            "word": "rerum",
     *            "image_path": null,
     *            "audio_path": null,
     *        }
     *    ],
     *    "success": true
     * }
     */
    public function index_edit($deck)
    {
        $result = [];
        $ordered = [];
        $queue = [];
        $deck = Deck::findOrFail($deck);
        $profile = $deck->profile()->get()->last();
        $ordered = $deck->cards()->wherePivot('card_order', '!=', null)->orderBy('card_order', 'asc')->get();
        $queue = $deck->cards()->wherePivot('card_order', '=', null)->orderBy('id', 'asc')->get();

        $reorder = 0;
        if (count($ordered) == 0) {
            $reorder = 0;
        } else {
            $reorder = $ordered->last()->pivot->card_order;
        }
        foreach ($queue as $que) {
            $reorder = $reorder + 1;
            $que->pivot->card_order = $reorder;
            $que->pivot->save();
        }
        foreach ($deck->cards()->orderBy('card_order', 'asc')->get() as $card) {
            $image = null;
            $audio = null;
            $image = $card->profiles()->where('profile_id','=',$profile->id)->get()->last()->pivot->image_path;
            $audio = $card->profiles()->where('profile_id','=',$profile->id)->get()->last()->pivot->audio_path;
            if ($image) $card['image_path'] = $image;
            if ($audio) $card['audio_path'] = $audio;
            $result['cards'][] = array(
                "card_id" => $card->id,
                'word' => $card->word,
                'image_path' => $card->image_path,
                'audio_path' => $card->audio_path
            );
        }
        $result['success'] = true;
        return response($result);
    }
    /**
     * @group 05.Card
     * Hide card in a deck
     * 
     * @response {
     *    "hidden": true,
     *    "success": true
     * }
     */
    public function hide($deck, $id)
    {
        $result = [];
        $card = Deck::find($deck)->cards()->wherePivot('card_id', '=', $id)->get()->last();
        if ($card->pivot->is_hidden) {
            $card->pivot->is_hidden = false;
            $card->pivot->save();
            $result['hidden'] = false;
            $result['success'] = true;
        } else {
            $card->pivot->is_hidden = true;
            $card->pivot->save();
            $result['hidden'] = true;
            $result['success'] = true;
        }
        return response($result);
    }
}
