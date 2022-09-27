<?php

namespace App\Http\Controllers;

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
     *            "image_path": "images/decks/202209261050imagefile.png"
     *       }
     *  }
     */
    public function show($id)
    {
        $result = [];
        $deck = Deck::find($id);
        $result['deck'] = array(
            'id' => $deck->id,
            'name' => $deck->name,
            'is_hidden' => $deck->is_hidden,
            'image_path' => $deck->image_path
        );
        return response($result);
    }
    
    /**
     * @group 04.Deck
     * Show all deck of a profile that were not hidden
     * @response {
     *    "decks": [
     *        {
     *            "id": 12,
     *            "name": "ipsam",
     *            "image_path": null
     *        },
     *        {
     *            "id": 13,
     *            "name": "laudantium",
     *            "image_path": null
     *        }
     *     ]
     *  }
     */
    public function index_show($profile)
    {
        $result = [];
        $ordered = [];
        $queue = [];
        $profile = Profile::find($profile);
        $ordered = $profile->decks()->whereNot('deck_order', '=', null)->orderBy('deck_order', 'asc')->get();
        $queue = $profile->decks()->where('deck_order', '=', null)->orderBy('id', 'asc')->get();
        if (count($ordered) == 0) {
            $reorder = 0;
        } else {
            $reorder = $ordered->last()->deck_order;
        }
        foreach ($queue as $que) {
            $reorder = $reorder + 1;
            $que->deck_order = $reorder;
            $que->save();
        }
        $decks = $profile->decks()->where('is_hidden','=',false)->orderBy('deck_order', 'asc')->get(['id','name','image_path']);
        $result['decks'] = $decks;
        return response($result);
    }
    /**
     * @group 04.Deck
     * Show all deck of a profile, even hidden
     * @response {
     *    "decks": [
     *        {
     *            "id": 12,
     *            "name": "ipsam",
     *            "image_path": null,
     *            "is_hidden": 0
     *        },
     *        {
     *            "id": 13,
     *            "name": "laudantium",
     *            "image_path": null
     *            "is_hidden": 1
     *
     *        }
     *     ]
     *  }
     */
    public function index_edit($profile)
    {
        $result = [];
        $profile = Profile::find($profile);
        $ordered = $profile->decks()->whereNot('deck_order', '=', null)->orderBy('deck_order', 'asc')->get();
        $queue = $profile->decks()->where('deck_order', '=', null)->orderBy('id', 'asc')->get();
        if (count($ordered) == 0) {
            $reorder = 0;
        } else {
            $reorder = $ordered->last()->deck_order;
        }
        foreach ($queue as $que) {
            $reorder = $reorder + 1;
            $que->deck_order = $reorder;
            $que->save();
        }

        $result['decks'] = $profile->decks()->orderBy('deck_order', 'asc')->get(['id','name','image_path','is_hidden']);
        return response($result);
    }

    /**
     * @group 04.Deck
     * Create & add deck to profile
     * 
     * @response {
     *    "deck": {
     *        "name": "Car",
     *        "profile_id": "7",
     *        "deck_order": 4,
     *        "updated_at": "2022-09-23T06:31:05.000000Z",
     *        "created_at": "2022-09-23T06:31:05.000000Z",
     *        "id": 26
     *    },
     *    "success": true
     * }
     */
    public function create(Request $request, $profile_id)
    {
        $result = [];
        $lastdeck = Profile::findOrFail($profile_id)->decks()->orderBy('deck_order')->get()->last();
        $valiadtor = Validator::make($request->all(), Deck::validation(null, $profile_id));
        if ($valiadtor->fails()) {
            $result['success'] = false;
        } else {
            if (!$request->image) {
                $newdeck = new Deck();
                $newdeck->fill($request->only(['name']));
                $newdeck->profile_id = $profile_id;
                $newdeck->deck_order = $lastdeck->deck_order +1;
                $newdeck->save();
                $result['deck'] = $newdeck;
                $result['success'] = true;
            } else {
                $file = $request->file('image');
                $filename = date('YmdHi') . $file->getClientOriginalName();
                $path = Storage::putFileAs('images/decks', $file, $filename);

                $newdeck = new Deck();
                $newdeck->fill($request->only(['name']));
                $newdeck->profile_id = $profile_id;
                $newdeck->deck_order = $lastdeck->deck_order +1;
                $newdeck->image_path = $path;
                $newdeck->save();
                $result['deck'] = $newdeck;
                $result['success'] = true;
            }
        }
        return response($result);
    }
    /**
     * @group 04.Deck
     * Edit deck
     * 
     * @response {
     *    "deck": {
     *        "id": 26,
     *        "name": "Carry",
     *        "global": 0,
     *        "profile_id": 7,
     *        "image_path": "images/decks/202209230636login-register.jpg",
     *        "deck_order": 4,
     *        "hidden": 0,
     *        "created_at": "2022-09-23T06:31:05.000000Z",
     *        "updated_at": "2022-09-23T06:36:36.000000Z",
     *        "deleted_at": null
     *    },
     *    "success": true
     * }
     */
    public function edit(Request $request, $id)
    {
        $deck = Deck::find($id);
        $profile_id = $deck->profile_id;
        $valiadtor = Validator::make($request->all(), Deck::validation($id, $profile_id));
        if ($valiadtor->fails()) {
            $result['success'] = false;
        } else {
            if (!$request->image) {
                $deck->fill($request->only(['name']));
                $deck->save();
            } else {
                $file = $request->file('image');
                $filename = date('YmdHi') . $file->getClientOriginalName();
                $path = Storage::putFileAs('images/decks', $file, $filename);

                $deck->fill($request->only(['name']));
                $deck->image_path = $path;
                $deck->save();
            }
            $result['deck'] = $deck;
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
        if ($deck->global) {
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
     * Hide deck
     * 
     * @response {
     *    "hidden": true,
     *    "success": true
     * }
     */
    public function hide($id)
    {
        $result = [];
        $deck = Deck::find($id);
        if($deck->hidden){
            $deck->hidden = false;
            $deck->save();
            $result['hidden'] = false;
            $result['success'] = true;
        } else {
            $deck->hidden = true;
            $deck->save();
            $result['hidden'] = true;
            $result['success'] = true;
        }
        return response($result);
    }
}
