<?php

namespace App\Http\Controllers;

use App\Models\Card;
use App\Models\Deck;
use App\Models\Image;
use App\Models\Patient_type;
use App\Models\Patienttype;
use App\Models\Profile;
use Carbon\Carbon;
use Dotenv\Parser\Value;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

use function PHPSTORM_META\type;
use function PHPUnit\Framework\isType;

class ProfileController extends Controller
{
    /**
     * @group 02.Profile
     * Profiles list
     * @response {
     *    "profile list": [
     *        {
     *            "id": 1,
     *            "user_id": 1,
     *            "name": "Emmy",
     *            "image_path": "images/profiles/202209221207alert.png",
     *            "created_at": "2022-09-21T09:29:04.000000Z",
     *            "updated_at": "2022-09-22T12:07:12.000000Z",
     *            "deleted_at": null
     *        }
     *    }
     */
    public function index()
    {
        $result = [];
        $profiles = Auth::user()->profiles;
        $result['profile list'] = $profiles;
        return response($result);
    }
    /**
     * @group 02.Profile
     * Show a profile
     * @response {
     *    "profile": {
     *        "id": 1,
     *        "name": "Emmy",
     *        "image": "images/profiles/202209221207alert.png",
     *        "patient_type": 4
     *    }
     * }
     */
    public function show($id)
    {
        $result = [];
        $profile = Profile::find($id);
        $result['profile'] = array(
            'id' => $profile->id,
            'name' => $profile->name,
            'image' => $profile->image_path,
            'patient_type' => $profile->patient_type_id
        );
        return response($result);
    }
    /**
     * @group 02.Profile
     * Edit a profile
     * @bodyParam name string
     * @bodyParam type_id string
     * @bodyParam image image mimes:jpg,png,jpeg,gif,svg,webp
     * @response {
     *    "profile": {
     *        "name": "Merry",
     *        "id": 6,
     *        "user_id": 1,
     *        "patient_type": "4",
     *        "decks": [
     *              {
     *                  "id": 11
     *              }
     *          ]
     *      },
     *      "success": true
     * }
     */
    public function edit($id, Request $request)
    {
        $result = [];
        $profile = Profile::find($id);
        $validator = Validator::make($request->all(), Profile::validation($id));
        if ($validator->fails()) {
            $result['success'] = false;
        } else {
            if (!$request->image) {
                $profile->user_id = Auth::user()->id;
                $profile->fill($request->only('name'));
                $profile->patient_type_id = $request->type_id;
                $profile->save();
            } else {
                $file = $request->file('image');
                $filename = date('YmdHi') . $file->getClientOriginalName();
                $profile->user_id = Auth::user()->id;
                $profile->fill($request->only('name'));
                $path = Storage::putFileAs('images/profiles', $file, $filename);
                $profile->image_path = $path;
                $profile->patient_type_id = $request->type_id;
                $profile->save();
            }
            $result['profile'] = array(
                'name' => $profile->name,
                'id' => $profile->id,
                'user_id' => $profile->user_id,
                'patient_type' => $profile->patient_type_id,
                'decks' => $profile->decks()->get('id')
            );
            $result['success'] = true;
        }
        return response($result);
    }
    /**
     * @group 02.Profile
     * Create a profile
     * @bodyParam name string required name
     * @bodyParam type_ids string required type_ids
     * @bodyParam image image required image mimes:jpg,png,jpeg,gif,svg,webp
     * @response {
     *    "profile": {
     *        "id": 9,
     *        "name": "Eddy",
     *        "patient_type": "4",
     *        "decks": [
     *            {
     *                "id": 22
     *            },
     *            {
     *                "id": 23
     *            },
     *        ]
     *    },
     *    "success": true
     * }
     */
    public function store(Request $request)
    {
        $result = [];
        $validator = Validator::make($request->all(), Profile::validation());
        if ($validator->fails()) {
            $result['success'] = false;
        } else {
            $file = $request->file('image');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $profile = new Profile();
            $profile->user_id = Auth::user()->id;
            $profile->fill($request->only(['name']));
            $path = Storage::putFileAs('images/profiles', $file, $filename);
            $profile->image_path = $path;
            $profile->patient_type_id = $request->type_id;
            $profile->save();

            // starter pack //copy deck & deck->card
            $decks = Patient_type::findOrFail($request->type_id)->decks()->get();
            foreach ($decks as $deck) {
                $card_ordering = 0;
                $newdeck = $deck->replicate();
                $newdeck->is_global = false;
                $newdeck->is_hidden = false;
                $newdeck->created_at = Carbon::now();
                $newdeck->updated_at = Carbon::now();
                $newdeck->profile_id = $profile->id;
                $newdeck->save();
                foreach ($deck->cards as $card) {
                    $card_ordering = $card_ordering + 1;
                    $newdeck->cards()->attach($card, ['card_order' => $card_ordering, 'is_hidden' => false]);
                    $profile->cards()->sync($card, false);
                    $profile->save();
                    $newdeck->save();
                }
            }
            $result['profile'] = array(
                'id' => $profile->id,
                'name' => $profile->name,
                'patient_type' => $profile->patient_type_id,
                'decks' => $profile->decks()->get('id')
            );
            $result['success'] = true;
        }
        return response($result);
    }
}
