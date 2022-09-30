<?php

namespace App\Http\Controllers;

use App\Http\Resources\CardResource;
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
     *            "id": 8,
     *            "word": "voluptatem",
     *            "is_hidden": 0
     *            "image_path": "public/storage/images/cards/202209260915image.png",
     *            "audio_path": "public/storage/audios/cards/202209260915audiofile.mp3"
     *        }
     *    ],
     *    "success": true
     * }
     */
    public function index_show($deck)
    {
        $result = [];
        $cards = [];

        $deck = Deck::findOrFail($deck);
        $profile = $deck->profile()->first();
        foreach ($deck->cards()->wherePivot('is_hidden', '=', false)->orderBy('card_order', 'asc')->get() as $card) {
            $image = null;
            $audio = null;
            $image = $card->profiles()->where('profile_id', '=', $profile->id)->get()->last()->pivot->image_path;
            if (!empty($image)) $card['image_path'] = $image;
            $audio = $card->profiles()->where('profile_id', '=', $profile->id)->get()->last()->pivot->audio_path;
            if (!empty($audio)) $card['audio_path'] = $audio;

            $cards[] = $card;
        }
        $result['cards'] = CardResource::collection($cards);
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
     *            "is_hidden": 0,
     *            "image_path": "public/storage/images/cards/202209260915image.png"
     *            "audio_path": "public/storage/audios/cards/202209260945audiofile.mp3"
     *        },
     *        {
     *            "card_id": 6,
     *            "word": "rerum",
     *            "is_hidden": 1,
     *            "image_path": "public/storage/images/cards/202209260945image.png"
     *            "audio_path": "public/storage/audios/cards/202209261008audiofile.mp3"
     *        }
     *    ],
     *    "success": true
     * }
     */
    public function index_edit($deck)
    {
        $result = [];
        $deck = Deck::findOrFail($deck);
        $profile = $deck->profile()->get()->last();
        foreach ($deck->cards()->wherePivot('is_hidden', '=', false)->orderBy('card_order', 'asc')->get() as $card) {
            $image = null;
            $audio = null;
            $image = $card->profiles()->where('profile_id', '=', $profile->id)->get()->last()->pivot->image_path;
            if (!empty($image)) $card['image_path'] = $image;
            $audio = $card->profiles()->where('profile_id', '=', $profile->id)->get()->last()->pivot->audio_path;
            if (!empty($audio)) $card['audio_path'] = $audio;
            
            $cards[] = $card;
        }
        $result['cards'] = CardResource::collection($cards);
        $result['success'] = true;
        return response($result);
    }
    /**
     * @group 05.Card
     * Hide/Show card in a deck
     * 
     * @response {
     *    "success": true,
     *    "card": {
     *        "id": 8,
     *        "word": "deleniti",
     *        "is_hidden": false,
     *        "image_path": null,
     *        "audio_path": null
     *    }
     */
    public function hide($deck, $id)
    {
        $result = [];
        $card = Deck::find($deck)->cards()->wherePivot('card_id', '=', $id)->get()->last();
        if ($card->pivot->is_hidden) {
            $card->pivot->is_hidden = false;
            $card->pivot->save();
            $result['success'] = true;
        } else {
            $card->pivot->is_hidden = true;
            $card->pivot->save();
            $result['success'] = true;
        }
        $result['card'] = new CardResource($card);
        return response($result);
    }
}
