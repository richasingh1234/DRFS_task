<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
//use App\Models\District;
use DB;

class State extends Model
{
    use HasFactory;
    
    protected $table = 'states';
    protected $fillable = ['id','createdBy','name'];
    public $timestamps = false;
    
    
    protected function updatecreate($request, $id = NULL)
    {

        DB::begintransaction();
        try {
            if (empty($id)) {
                $state = new self;
            } else {
                $state = self::find($id);
            }
            $state->createdBy = auth()->user()->id;
            $state->name = $request->state;
            $state->created_at = now();
            $state->updated_at = NULL;
            DB::commit();
            $success = true;
        } catch (\Exception $e) {
            DB::rollback();
            $success = false;
        }

        if ($success) {
            $store = $state->save();
            return true;
        } else {
            \Session::flash('error', 'Unable to process request.Error:' . json_encode($e->getMessage(), true));
            return redirect()->back();
        }
    }
    
    
    
    
}
