<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use App\Models\State;

class StateController extends Controller
{
   
     /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('auth:api', ['except' => ['state','add-state']]);
    }

    public function index()
    {
        $state=State::orderBy('created_at','desc')->get();
        return response()->json([
            'status' => 'true',
            'message' => 'Data retrive successfully...!',
            'data' =>  $state,
            'error' => [],
           ],200);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|between:2,100',
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
            'createdBy' => 1,
        ];
        $state= State::create($data);
        return response()->json([
            'status' => 'true',
            'message' => 'State Successfully Added..!',
            'data' =>  $state,
            'error' => []
        ], 201);
    }
}
