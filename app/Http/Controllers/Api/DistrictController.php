<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use App\Models\District;

class DistrictController extends Controller
{
   /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('auth:api', ['except' => ['district','add-district']]);
    }

    public function index()
    {
        $district=District::orderBy('created_at','desc')->get();
        return response()->json([
            'status' => 'true',
            'message' => 'Data retrive successfully...!',
            'data' =>  $district,
            'error' => [],
           ],200);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|between:2,100',
            'state_id' => 'required',
        ]);
        if($validator->fails()){
            return response()->json([
             'status' => 'false',
             'message' => 'Something went wrong..!',
             'data' => [],
             'error' => $validator->errors()
            ], 400);
        }
        $data = [
            'name' => $request->name,
            'state_id' => $request->state_id,
            'createdBy' => 1,
        ];
        $district= District::create($data);
        return response()->json([
            'status' => 'true',
            'message' => 'District Successfully Added..!',
            'data' =>  $district,
            'error' => []
        ], 201);
    }
}
