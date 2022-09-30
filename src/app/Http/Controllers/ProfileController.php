<?php

namespace App\Http\Controllers;

use App\Http\Resources\DeckResource;
use App\Http\Resources\ProfileResource;
use App\Models\Patient_type;
use App\Models\PatientType;
use App\Models\Profile;
use Carbon\Carbon;
use Illuminate\Http\Request;
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
     *    "profiles": [
     *        {
     *            "name": "Emmy",
     *            "type": 4,
     *            "image_path": "public/storage/images/profiles/202209221207alert.png"
     *        }
     *    }
     */
    public function index()
    {
        $result = [];
        $user_id = Auth::user()->id;
        $result['profiles'] = ProfileResource::collection(Profile::where('user_id', '=', $user_id)->orderBy('id', 'asc')->get());
        return response($result);
    }
    /**
     * @group 02.Profile
     * Show a profile
     * @response {
     *    "profile": {
     *        "name": "Emmy",
     *        "type": 4,
     *        "image_path": "public/storage/images/profiles/202209221207alert.png"
     *    }
     * }
     */
    public function show($id)
    {
        $result = [];
        $result['profile'] = new ProfileResource(Profile::find($id));
        return response($result);
    }
    /**
     * @group 02.Profile
     * Edit a profile
     * @bodyParam name string
     * @bodyParam type_id string
     * @bodyParam image image mimes:jpg,png,jpeg,gif,svg,webp
     * @response {
     *      "profile": {
     *        "name": "Merry",
     *        "type": "4",
     *        "image": "public/storage/images/profiles/2022092706461.jpg"
     *      },
     *      "success": true
     * }
     */
    public function edit($id, Request $request)
    {
        $result = [];
        $profile = Profile::find($id);
        $validator = Validator::make($request->all(), Profile::validation($id), Profile::$msg);
        if ($validator->fails()) {
            $result['error'] = $validator->messages();
            $result['success'] = false;
        } else {
            if (!$request->image) {
                $profile->fill($request->only('name'));
                $profile->patient_type_id = $request->type_id;
                $profile->save();
            } else {
                $file = $request->file('image');
                $filename = date('YmdHi') . $file->getClientOriginalName();
                $profile->fill($request->only('name'));
                $path = Storage::putFileAs('images/profiles', $file, $filename);
                $profile->image_path = $path;
                $profile->patient_type_id = $request->type_id;
                $profile->save();
            }
            $result['profile'] = new ProfileResource($profile);
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
     *      "profile": {
     *        "name": "Merry",
     *        "type": "4",
     *        "image": "public/storage/images/profiles/2022092706461.jpg"
     *      },
     *      "decks": [
     *          {
     *              "id": 32,
     *              "name": "non",
     *              "#cards": 8
     *          }
     *      ],
     *    "success": true
     * }
     */
    public function store(Request $request)
    {
        $result = [];
        $validator = Validator::make($request->all(), Profile::validation(), Profile::$msg);
        if ($validator->fails()) {
            $result['error'] = $validator->messages();
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
            $decks = PatientType::findOrFail($request->type_id)->decks()->get();
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
            $result['profile'] = new ProfileResource($profile);
            $result['decks'] = DeckResource::collection($profile->decks);
            $result['success'] = true;
        }
        return response($result);
    }
}
