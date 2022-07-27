<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cancel;
use App\Models\Booking;
use App\Models\PersonalAccessTokens;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Database\Eloquent\Collection;

class CancelController extends Controller
{
    //
   		
    function save(Request $req)
    {
         $validator = Validator::make($req->all(),[
            	
            'booking_id'=>'required|max:191',	
            'cancel_travel_date'=>'required|max:191',	
            'reason'=>'required|max:191',	
        
        ]);  
        
         if($validator->fails()){
            return[
                'status'=>409,"Result"=>$validator->messages()];

        }
        
        else{
           $y= $req->total_amount-$req->amount_paid;
        $Cancel=new Booking;
        $Cancel->booking_id=$req->booking_id;
        $Cancel->cancel_travel_date=$req->cancel_travel_date;
        $Cancel->reason=$req->reason;
        $result=$Cancel->save();
        if($result){
            $Booking=Booking::find ($id);
            $Booking->is_ride="CANCEL";
            $result2=$Booking->save();

            if($result2)
            {
                return[
                    'status'=>200,"Result"=>"ADDED Succesfully"];
            }
            return[
                'status'=>200,"Result"=>"Cancelled Succesfully"];
            
        }
        else{
            return["Result"=>"Cant add Record"];
        }
        
        }
      
    }
}
