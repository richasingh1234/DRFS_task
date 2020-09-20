<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

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
                $allowedfileExtension = ['pdf', 'docx'];
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
            return true;
        } else {
            \Session::flash('error', 'Unable to process request.Error:' . json_encode($e->getMessage(), true));
            return redirect()->back();
        }
    }

    public function hasCreated() {
        return $this->belongsTo(User::class, 'createdBy');
    }

}
