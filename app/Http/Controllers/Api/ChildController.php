<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use App\Models\Child;
use Storage;
class ChildController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('auth:api', ['except' => ['child','add-child']]);
    }

    public function index()
    {
        $child=Child::orderBy('created_at','desc')->get();
        return response()->json([
            'status' => 'true',
            'message' => 'Data retrive successfully...!',
            'data' =>  $child,
            'error' => [],
           ],200);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|between:2,100',
            'motherName' => 'required',
            'fatherName' => 'required',
            'sex'   => 'required',
            'dateOfBirth' => 'required',
            'state_id' => 'required',
            'district_id' => 'required',
        ]);
        if($validator->fails()){
            return response()->json([
             'status' => 'false',
             'message' => 'Something went wrong..!',
             'data' => [],
             'error' => $validator->errors()
            ], 400);
        }

        if ($request->hasFile('profileImage')) {
                $allowedfileExtension = ['png', 'jpeg','jpg','PNG'];
                $files = $request->file('profileImage');

                $filename = $files->getClientOriginalName();
                $extension = $files->getClientOriginalExtension();
                $check = in_array($extension, $allowedfileExtension);

                if($check) 
                {
                    $imageName = $filename. '_' . time() . '.' . request()->profileImage->getClientOriginalExtension();
                               

            $request->file('profileImage')->storeAs('public/profileImage', $imageName);
                }
            }

        $data = [
            'name' => $request->name,
            'motherName' => $request->motherName,
            'fatherName' => $request->fatherName,
            'sex' => $request->sex,
            'dateOfBirth' => $request->dateOfBirth,
            'state_id' => $request->state_id,
            'district_id' => $request->district_id,
            'createdBy' => 1,
            'profileImage' =>  $imageName,
        ];
        $child= Child::create($data);
        return response()->json([
            'status' => 'true',
            'message' => 'Child Successfully Added..!',
            'data' =>  $child,
            'error' => []
        ], 201);
    }
}
