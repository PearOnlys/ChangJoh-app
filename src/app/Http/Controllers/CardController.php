<?php

namespace App\Http\Controllers;

use App\Models\Card;
use App\Models\Deck;
use App\Models\Image;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class CardController extends Controller
{
    /**
     * @group 05.Card
     * Show a card
     * @response {
     *    "card": {
     *        "id": 35,
     *        "word": "MerryWaether",
     *        "image_path": "images/cards/202209230745imagefilejpg.jpg",
     *        "audio_path": "audio/cards/202209230821audiofileMP3.mp3"
     *    }
     * }
     */
    public function show($deck, $id)
    {
        $card = Card::findOrFail($id);
        $profile = Deck::find($deck)->get()->last()->profile;
        $image = $card->profiles()->where('profile_id', '=', $profile->id)->get()->last()->pivot->image_path;
        $audio = $card->profiles()->where('profile_id', '=', $profile->id)->get()->last()->pivot->audio_path;
        if ($image) $card['image_path'] = $image;
        if ($audio) $card['audio_path'] = $audio;
        $result['card'] = array(
            "card_id" => $card->id,
            'word' => $card->word,
            'image_path' => $card->image_path,
            'audio_path' => $card->audio_path
        );
        return response($result);
    }
    /**
     * @group 05.Card
     * Create & add card to deck
     * @bodyParam word required string
     * @bodyParam image required mimes:jpg,png,jpeg,gif,svg,webp
     * @bodyParam audio audio mime:mimes:mp3,mpga,wav,ogg
     * 
     * @response {
     *    "card": {
     *        "word": "Merry",
     *        "is_global": false,
     *        "image_path": "images/cards/202209230745login-register.jpg",
     *        "audio_path": "audio/cards/202209230821audiofileMP3.mp3",
     *        "updated_at": "2022-09-23T07:45:31.000000Z",
     *        "created_at": "2022-09-23T07:45:31.000000Z",
     *        "id": 22
     *    },
     *    "success": true
     * }
     */
    public function create(Request $request, $deck)
    {
        $deck = Deck::find($deck);
        $profile = $deck->profile()->get()->last();
        $valiadtor = Validator::make($request->all(), Card::validation(null));
        if ($valiadtor->fails()) {
            $result['success'] = false;
        } else {
            $card = new Card();
            $card->fill($request->only(['word']));
            $card->is_global = false;
            if ($request->image) {
                $fileImg = $request->file('image');
                $filenameImg = date('YmdHi') . $fileImg->getClientOriginalName();
                $pathImg = Storage::putFileAs('images/cards', $fileImg, $filenameImg);
                $card->image_path = $pathImg;
            }
            if ($request->audio) {
                $fileAudio = $request->file('audio');
                $filenameAudio = date('YmdHi') . $fileAudio->getClientOriginalName();
                $pathAudio = Storage::putFileAs('audios/cards', $fileAudio, $filenameAudio);
                $card->audio_path = $pathAudio;
            }
            $card->save();

            $card_ordering = $deck->cards()->max('card_order') + 1;
            $deck->cards()->attach($card, ['card_order' => $card_ordering, 'is_hidden' => false]);
            $profile->cards()->sync($card, false);
            $result['card'] = $card;
            $result['success'] = true;
        }
        return response($result);
    }
    /**
     * @group 05.Card
     * Edit a card
     * @bodyParam word string
     * @bodyParam image image mimes:jpg,png,jpeg,gif,svg,webp
     * @bodyParam audio audio mime:mimes:mp3,mpga,wav,ogg
     * @response {
     *    "card": {
     *        "id": 35,
     *        "is_global": false,
     *        "word": "MerryWaether",
     *        "image_path": "images/cards/202209230745imagefilejpg.jpg",
     *        "audio_path": "audio/cards/202209230821audiofileMP3.mp3"
     *    },
     *    "success": true
     * }
     */
    public function edit(Request $request, $deck, $id)
    {
        $profile = Deck::find($deck)->profile()->get()->last();
        $valiadtor = Validator::make($request->all(), Card::validation($id));
        if ($valiadtor->fails()) {
            $result['success'] = false;
        } else {
            $card = Card::find($id);
            $pathAudio = null;
            $pathImg = null;
            if ($request->image != null) {
                $fileImg = $request->file('image');
                $filenameImg = date('YmdHi') . $fileImg->getClientOriginalName();
                $pathImg = Storage::putFileAs('images/cards', $fileImg, $filenameImg);
            }
            if ($request->audio != null) {
                $fileAudio = $request->file('audio');
                $filenameAudio = date('YmdHi') . $fileAudio->getClientOriginalName();
                $pathAudio = Storage::putFileAs('audios/cards', $fileAudio, $filenameAudio);
            }
            if ($card->is_global) {
                $pivot = $card->profiles()->where('profile_id', '=', $profile->id)->get()->last()->pivot;
                $pivot->image_path = $pathImg;
                $pivot->audio_path = $pathAudio;
                $pivot->save();
                $result['card'] = array(
                    'id' => $card->id,
                    'is_global' => true,
                    'word' => $card->word,
                    'image_path' => $pivot->image_path,
                    'audio_path' => $pivot->audio_path
                );
            } else {
                $card->image_path = $pathImg;
                $card->audio_path = $pathAudio;
                $card->word = $request->word;
                $card->save();
                $result['card'] = $card;
                $result['card'] = array(
                    'id' => $card->id,
                    'is_global' => false,
                    'word' => $card->word,
                    'image_path' => $card->image_path,
                    'audio_path' => $card->audio_path
                );
            }
            $result['success'] = true;
        }
        return response($result);
    }
    /**
     * @group 05.Card
     * Delete card
     * 
     * @response {
     *    "msg": "Deck delete",
     *    "success": false
     * }
     */
    public function destroy($deck, $id)
    {
        $card = Card::find($id);
        if (!$card->global) {
            Card::find($id)->delete();
            $result['msg'] = 'Card delete';
            $result['success'] = true;
        } else {
            $result['msg'] = 'Global card';
            $result['success'] = false;
        }
    }
}
