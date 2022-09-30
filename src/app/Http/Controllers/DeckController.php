<?php

namespace App\Http\Controllers;

use App\Http\Resources\DeckResource;
use App\Http\Resources\ProfileResource;
use App\Models\Card;
use App\Models\Deck;
use App\Models\Profile;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

use function GuzzleHttp\Promise\queue;

class DeckController extends Controller
{
    /**
     * @group 04.Deck
     * Show a deck
     * 
     * @response {
     *    "decks": {
     *            "id": 12,
     *            "name": "ipsam",
     *            "is_hidden": 0,
     *            "image_path": "images/decks/202209261050imagefile.png",
     *            "#cards": 0
     *    }
     * }
     */
    public function show($id)
    {
        $result = [];
        $result['deck'] = new DeckResource(Deck::findOrFail($id));
        return response($result);
    }

    /**
     * @group 04.Deck
     * Show all deck of a profile that were not hidden
     * @response {
     *   "decks": [
     *       {
     *           "id": 11,
     *           "name": "dolores",
     *           "is_hidden": 0,
     *           "image_path": "public/storage/",
     *           "#cards": 2
     *       },
     *       {
     *           "id": 13,
     *           "name": "beatae",
     *           "is_hidden": 0,
     *           "image_path": "public/storage/",
     *           "#cards": 5
     *       }
     *   ]
     * }
     */
    public function index_show($profile)
    {
        $result = [];
        $profile = Profile::findOrFail($profile);
        $decks = $profile->decks()->where('is_hidden','=',false)->orderBy('deck_order', 'asc')->get();
        $result['decks'] = DeckResource::collection($decks);
        return response($result);
    }
    /**
     * @group 04.Deck
     * Show all deck of a profile, even hidden
     * @response {
     *   "decks": [
     *       {
     *           "id": 11,
     *           "name": "dolores",
     *           "is_hidden": 0,
     *           "image_path": "public/storage/",
     *           "#cards": 2
     *       },
     *       {
     *           "id": 13,
     *           "name": "beatae",
     *           "is_hidden": 1,
     *           "image_path": "public/storage/",
     *           "#cards": 5
     *       }
     *   ]
     * }
     */
    public function index_edit($profile)
    {
        $result = [];
        $profile = Profile::findOrFail($profile);
        $decks = $profile->decks()->orderBy('deck_order', 'asc')->get();
        $result['decks'] = DeckResource::collection($decks);
        return response($result);
    }

    /**
     * @group 04.Deck
     * Create & add deck to profile
     * 
     * @response {
     *   "deck":
     *       {
     *           "id": 11,
     *           "name": "dolores",
     *           "is_hidden": 0,
     *           "image_path": "public/storage/images/decks/202209300415safari-logo.png",
     *           "#cards": 0
     *       },
     *    "profile":
     *       {
     *           "id": 11,
     *           "name": "Merry Weather",
     *           "type": 2,
     *           "image": "public/storage/images/profiles/202209260458sketch.jpg",
     *       }
     *     "success": true
     * }
     */
    public function create(Request $request, $profile_id)
    {
        $result = [];
        $valiadtor = Validator::make($request->all(), Deck::validation(null, $profile_id));
        $profile = Profile::findOrFail($profile_id);
        if ($valiadtor->fails()) {
            $result['error'] = $valiadtor->messages();
            $result['success'] = false;
        } else {
            $newdeck = new Deck();
            if (!$request->image) {
                $newdeck->image_path = null;
            } else {
                $file = $request->file('image');
                $filename = date('YmdHi') . $file->getClientOriginalName();
                $path = Storage::putFileAs('images/decks', $file, $filename);
                $newdeck->image_path = $path;
            }
            $newdeck->fill($request->only(['name']));
            $newdeck->profile_id = $profile_id;
            $newdeck->deck_order = $profile->decks()->max('deck_order')+1;
            $newdeck->is_hidden = false;
            $newdeck->save();

            $result['deck'] = new DeckResource($newdeck);
            $result['profile'] = new ProfileResource($profile);
            $result['success'] = true;
        }
        return response($result);
    }
    /**
     * @group 04.Deck
     * Edit deck
     * 
     * @response {
     *    "deck": {
     *        "id": 14,
     *        "name": "popapi",
     *        "is_hidden": 0,
     *        "image_path": "public/storage/images/decks/202209300521firefox-logo.png",
     *        "#cards": 3
     *    },
     *    "success": true
     * }
     */
    public function edit(Request $request, $id)
    {
        $deck = Deck::find($id);
        $profile_id = $deck->profile_id;
        $valiadtor = Validator::make($request->all(), Deck::validation($id, $profile_id),Deck::$msg);
        if ($valiadtor->fails()) {
            $result['error'] = $valiadtor->messages();
            $result['success'] = false;
        } else {
            if($request->image){
                $file = $request->file('image');
                $filename = date('YmdHi') . $file->getClientOriginalName();
                $path = Storage::putFileAs('images/decks', $file, $filename);
                $deck->image_path = $path;
            }
            $deck->fill($request->only(['name']));
            $deck->save();
            $result['deck'] = new DeckResource($deck);
            $result['success'] = true;
        }
        return response($result);
    }
    /**
     * @group 04.Deck
     * Delete deck
     * 
     * @response {
     *    "msg": "Deck delete",
     *    "success": false
     * }
     */
    public function destroy($id)
    {
        $result = [];
        $deck = Deck::find($id);
        if ($deck->is_global) {
            $result['msg'] = 'Global deck';
            $result['success'] = false;
        } else {
            Deck::find($id)->delete();
            $result['msg'] = 'Deck delete';
            $result['success'] = true;
        }
        return response($result);
    }
    /**
     * @group 04.Deck
     * Hide/Show deck
     * 
     * @response {
     *    "success": true,
     *    "deck": {
     *        "id": 16,
     *        "name": "est",
     *        "is_hidden": true,
     *        "image_path": null,
     *        "#cards": 6
     *    }
     */
    public function hide($id)
    {
        $result = [];
        $deck = Deck::find($id);
        if($deck->is_hidden){
            $deck->is_hidden = false;
            $deck->save();
            $result['success'] = true;
        } else {
            $deck->is_hidden = true;
            $deck->save();
            $result['success'] = true;
        }
        $result['deck'] = new DeckResource($deck);
        return response($result);
    }
}
