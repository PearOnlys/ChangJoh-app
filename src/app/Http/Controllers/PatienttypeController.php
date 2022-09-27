<?php

namespace App\Http\Controllers;

use App\Models\Patienttype;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PatienttypeController extends Controller
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
        $types = Patienttype::orderBy('name','asc')->get(['id','name']);
        $result['types'] = $types;
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
        $validate = Validator::make($request->all(), Patienttype::$rules);
        if($validate->fails()){
            $result['success'] = false;
        } else {
            $type = $this->create($request->only('name'));
            $type->save();
            $result['type'] = array(
                'id' => $type->id,
                'name' => $type->name
            );
            $result['success'] = true;
        }
        return response($result);
    }

    private function create($data)
    {
        $type = new Patienttype();
        $type->name = $data['name'];
        $type->save();
        return $type;
    }
}
