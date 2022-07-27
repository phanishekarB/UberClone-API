<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;
use App\Models\Booking;
use App\Models\PersonalAccessTokens;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Database\Eloquent\Collection;

class PaymentController extends Controller
{
    //
    				
    function save(Request $req)
    {
         $validator = Validator::make($req->all(),[
            	
            'booking_id'=>'required|max:191',	
            'total_amount'=>'required|max:191',	
            'amount_paid'=>'required|max:191',	
        
        ]);  
        
         if($validator->fails()){
            return[
                'status'=>409,"Result"=>$validator->messages()];

        }
        
        else{
           $y= $req->total_amount-$req->amount_paid;
        $Payment=new Booking;
        $Payment->booking_id=$req->booking_id;
        $Payment->total_amount=$req->total_amount;
        $Payment->amount_paid	=$req->amount_paid;
        $Payment->amount_peding=$y;
        $Payment->description=$req->description;
        $result=$Payment->save();
        if($result){
            return[
                'status'=>200,"Result"=>"ADDED Succesfully"];
            
        }
        else{
            return["Result"=>"Cant add Record"];
        }
        
        }
      
    }
}
