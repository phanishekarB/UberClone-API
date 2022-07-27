<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\PersonalAccessTokens;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Database\Eloquent\Collection;

class BookingController extends Controller
{
    //
    function save(Request $req)
    {
         $validator = Validator::make($req->all(),[
            	
            'customer_name'=>'required|max:191',	
            'phone_number'=>'required|max:191',	
            'email'=>'required|max:191',	
            'gender'=>'required|max:191',
            'booking_date'=>'required|max:191',	
            'pick_up'=>'required|max:191',	
            'drop'	=>'required|max:191',
            'vehicle_name'=>'required|max:191',	
            'vehicle_id'=>'required|max:191',
            'driver_name'=>'required|max:191',
            'price'	=>'required|max:191',
            'is_ride'	=>'required|max:191',
            'booked_by'	=>'required|max:191'
        
        ]);  
        
         if($validator->fails()){
            return[
                'status'=>409,"Result"=>$validator->messages()];

        }
        
        else{
        
        $Booking=new Booking;
        $Booking->customer_name=$req->customer_name;
        $Booking->phone_number=$req->phone_number;
        $Booking->email	=$req->email;
        $Booking->gender=$req->gender;
        $Booking->booking_date=$req->booking_date;
        $Booking->pick_up=$req->pick_up;
        $Booking->drop	=$req->drop;
        $Booking->vehicle_name=$req->vehicle_name;
        $Booking->vehicle_id=$req->vehicle_id;
        $Booking->driver_name=$req->driver_name;
        $Booking->price	=$req->price;
        $Booking->booked_by=$req->booked_by;
        $result=$Booking->save();
        if($result){
            return[
                'status'=>200,"Result"=>"ADDED Succesfully"];
            
        }
        else{
            return["Result"=>"Cant add Record"];
        }
        
        }
      
    }
    
    function getAll()
    {
        $Booking=Booking::where('is_ride','NO')->get();
       
            return["status"=>"200","Result"=>$Booking];
        
    }

    
   function delete($id)
   {
       $find=Booking::find($id);
       
       if($find)
       {
           $result=Booking::find($id)->delete();
           return response("Booking Deleted Succesfully");
       }
       else
       {
           return response("No Record Found");
       }
   }
}
