<?php

namespace App\Http\Controllers;

use App\Http\Resources\TypeResource;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TypeController extends Controller
{
    /**
     * @group 03.Patient type
     * Show all patient type
     * @response {
     *    "types": [
     *        {
     *            "id": 10,
     *            "name": "debitis"
     *        }
     *     ]
     *  }
     */
    public function index()
    {
        $result = [];
        $result['types'] = TypeResource::collection(Type::orderBy('name','asc')->get(['id','name']));
        return response($result);
    }
    /**
     * @group 03.Patient type
     * Add a patient type
     * @response {
     *    "type": {
     *        "id": 13,
     *        "name": "stroke"
     *    },
     *    "success": true
     *  }
     */
    public function store(Request $request)
    {
        $result = [];
        $validate = Validator::make($request->all(), Type::$rules, Type::$msg);
        if($validate->fails()){
            $result['error'] = $validate->messages();
            $result['success'] = false;
        } else {
            $type = $this->create($request->only('name'));
            $type->save();
            $result['type'] = new TypeResource($type);
            $result['success'] = true;
        }
        return response($result);
    }

    private function create($data)
    {
        $type = new Type();
        $type->name = $data['name'];
        $type->save();
        return $type;
    }
}
