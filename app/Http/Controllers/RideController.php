<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ride;
use App\Models\Booking;
use App\Models\PersonalAccessTokens;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Database\Eloquent\Collection;

class RideController extends Controller
{
    //
  
    function save(Request $req)
    {
         $validator = Validator::make($req->all(),[
            	
            'booking_id'=>'required|max:191',	
            'starting_kms'=>'required|max:191',	
            'end_kms'=>'required|max:191',	
            'total_kms'=>'required|max:191',
            'start_travel_date'=>'required|max:191',	
            'end_travel_date'=>'required|max:191',	
            'pick_up'	=>'required|max:191',
            'drop'=>'required|max:191',	
            'vehicle_id'=>'required|max:191',
            'vehicle_name'=>'required|max:191',
            'driver_name'	=>'required|max:191',
            'is_ride'	=>'required|max:191',
            'review'	=>'required|max:191'
        
        ]);  
        
         if($validator->fails()){
            return[
                'status'=>409,"Result"=>$validator->messages()];

        }
        
        else{
            	
           $x= $req->end_kms-$req->starting_kms;
           $id=$req->booking_id;
        $Ride=new Ride;
        $Ride->booking_id=$req->booking_id;
        $Ride->starting_kms=$req->starting_kms;
        $Ride->end_kms	=$req->end_kms;
        $Ride->total_kms=$x;
        $Ride->start_travel_date=$req->start_travel_date;
        $Ride->end_travel_date=$req->end_travel_date;
        $Ride->pick_up=$req->pick_up;
        $Ride->drop=$req->drop;
        $Ride->vehicle_name=$req->vehicle_name;
        $Ride->vehicle_id=$req->vehicle_id;
        $Ride->driver_name=$req->driver_name;
        $Ride->review=$req->review;
        $result=$Ride->save();
        if($result){
            $Booking=Booking::find ($id);
            $Booking->is_ride="YES";
            $result2=$Booking->save();

            if($result2)
            {
                return[
                    'status'=>200,"Result"=>"ADDED Succesfully"];
            }
           
            
        }
        else{
            return["Result"=>"Cant add Record"];
        }
        
        }
      
    }


    function getAll()
    {
        $Ride=Ride::get();
       
            return["status"=>"200","Result"=>$Ride];
        
    }

}
