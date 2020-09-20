<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\District;
use App\Models\State;

use App\Http\Controllers\Controller;

class DropdownController extends Controller
{
     public function index()
        {
            $countries = State::pluck("name","id");
            return view('index',compact('countries'));
        }

        

        public function getDistrictList(Request $request)
        {
            $districts = District::where("state_id",$request->state_id)
            ->pluck("name","id");
            return response()->json($districts);
        }
}
