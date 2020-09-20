<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\District;
use App\Models\State;
use DB;

use App\Http\Controllers\Controller;

class DistrictController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        return view('backend.district.create', ['state' => $state,'district' => $district]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::beginTransaction();
        try {

            $exist = District::where('name', $request->district)->first();

            if (!empty($exist->id)) {
                $id = $exist->id;
            } else {
                $id = null;
            }

            $District = District::updatecreate($request, $id);
            DB::commit();

            $success = true;
        } catch (\Exception $e) {
            DB::rollback();
            $success = false;
            \Log::debug("about: " . $e->getMessage());
        }

        if ($success) {
            $request->session()->flash('success', 'District added successfully');
            return redirect()->back();
        } else {
            \Session::flash('warning', 'Unable to process request.Error');
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
        //
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
