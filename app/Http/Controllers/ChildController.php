<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Models\District;
use App\Models\State;
use App\Models\Child;
use DB;

class ChildController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $child = Child::with('district','state','user')->orderBy('name', 'asc')->get();
      return view('backend.child.index', ['child' => $child]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $state = State::orderBy('name', 'asc')->select('name', 'id')->get();
        $district = District::orderBy('name', 'asc')->select('name', 'id')->get();
        return view('backend.child.create', ['state' => $state,'district' => $district]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
       $validator = Validator::make($request->all(), [
            'child' => 'required|string',
            'sex' => 'required|not_in:0',
            'dob' => 'required',
            'fathername' => 'required|string|min:6',
            'mothername' => 'required|string|min:6',
            'state' => 'required|not_in:0',
            'district' => 'required|not_in:0',  
            'profileImage' => 'required|mimes:jpeg,png,|max:1000000',
        ]);
       
       if ($validator->fails()) {
//           dd($validator->errors()->has('child'));
            $messages = $validator->messages();
       return redirect()->back()->withErrors($messages)->withInput($request->all()); 
        }

     
        DB::beginTransaction();
        try {

            $exist = Child::where('name', $request->child)->first();

            if (!empty($exist->id)) {
                $id = $exist->id;
                $mess='updated';
            } else {
                $id = null;
                $mess='added';
            }

            $child = Child::updatecreate($request, $id);
            DB::commit();

            $success = $child;
        } catch (\Exception $e) {
            DB::rollback();
            $success = false;
            \Log::debug("about: " . $e->getMessage());
        }

        if ($success) {
            $request->session()->flash('message', 'Child '.$mess.' successfully'); 
            $request->session()->flash('alert-class', 'alert-success'); 
            return redirect('child');
        } else {
            $request->session()->flash('message', 'Unable to process request.Error');
            $request->session()->flash('alert-class', 'alert-danger'); 
            return redirect()->back();
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $child = Child::orderBy('name', 'asc')->where('id',$id)->first();
        return view('backend.child.show', ['child' => $child]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
