<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Model\User;
//use App\Model\State;
use DB;

class District extends Model
{
    use HasFactory;
    
    protected $table = 'districts';
    protected $fillable = ['id','createdBy','name','state_id'];
    public $timestamps = false;
    
    
    protected function updatecreate($request, $id = NULL)
    {

        DB::begintransaction();
        try {
            if (empty($id)) {
                $district = new self;
            } else {
                $district = self::find($id);
            }
            $district->createdBy = auth()->user()->id;
            $district->name = $request->district;
            $district->state_id = $request->state;
            $district->created_at = now();
            $district->updated_at = Null;
            DB::commit();
            $success = true;
        } catch (\Exception $e) {
            DB::rollback();
            $success = false;
        }

        if ($success) {
            $store = $district->save();
            return true;
        } else {
            \Session::flash('error', 'Unable to process request.Error:' . json_encode($e->getMessage(), true));
            return redirect()->back();
        }
    }
    
    public function hasCreated()
    {
        return $this->belongsTo(User::class, 'createdBy');
    }
    
   
    
    
}
