<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
use App\Models\District;
use App\Models\State;

class Child extends Model {

    use HasFactory;

    protected $table = 'childs';
    protected $fillable = ['id', 'name', 'motherName', 'fatherName', 'sex', 'dateOfBirth', 'createdBy', 'state_id', 'district_id', 'profileImage'];
    public $timestamps = false;

    protected function updatecreate($request, $id = NULL) {

        DB::begintransaction();

        try {
            if (empty($id)) {
                $childs = new self;
            } else {
                $childs = self::find($id);
            }
            
            

            if ($request->hasFile('profileImage')) {
                $allowedfileExtension = ['png', 'jpeg','jpg','PNG'];
                $files = $request->file('profileImage');

                $filename = $files->getClientOriginalName();
                $extension = $files->getClientOriginalExtension();
                $check = in_array($extension, $allowedfileExtension);

                if($check) 
                {
                    $filenames = $files->store('profileImage');
                }
            }


            $childs->createdBy = auth()->user()->id;
            $childs->name = $request->child;
            $childs->state_id = $request->state;
            $childs->district_id = $request->district;
            $childs->sex = $request->sex;
            $childs->motherName = $request->mothername;
            $childs->fatherName = $request->fathername;
            $childs->dateOfBirth = $request->dob;
            $childs->profileImage = $filenames;
            $childs->created_at = now();
            $childs->updated_at = Null;
            DB::commit();
            $success = true;
        } catch (\Exception $e) {
            
            DB::rollback();
            $success = false;
        }

        if ($success) {
            $store = $childs->save();
            return $success;
        } else {
//            \Session::flash('error', 'Unable to process request.Error:' . json_encode($e->getMessage(), true));
//            $request->session()->flash('message', 'Unable to process request.Error:' . json_encode($e->getMessage(), true)); 
//            $request->session()->flash('alert-class', 'alert-success'); 
//            return redirect()->back();
            return $success;
        }
    }

    public function user() {
        return $this->belongsTo(User::class, 'createdBy');
    }
    
    public function district()
    {
      return $this->belongsTo(District::class);
    }  
    
    public function state()
    {
      return $this->belongsTo(State::class);
    }

}
