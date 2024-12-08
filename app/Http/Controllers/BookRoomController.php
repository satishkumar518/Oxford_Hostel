<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BookRoom;
use App\Models\Room;
use Carbon\Carbon;
use Auth;


class BookRoomController extends Controller
{
    public function manageRequest(){
        $data=BookRoom::all(); 
        return view('admin.managerequest', compact('data'));
    }
    // view all student booking details
    public function viewStudentBookingDetails(){
        $data = BookRoom::all();
        return view('admin.viewstudentbooking', compact('data'));
    }

    // delete data 
    public function delete(String $id){
        $data=BookRoom::find($id);
        $result=$data->delete();
        if($result){
            return redirect()->back()->with('success','Data is Deleted Successfully');

        }  
    }
    
    // view student booking details
    public function viewBookDetails(){
        $auth_id = Auth::guard('student')->user()->id;
        $id = BookRoom::where('sid', $auth_id)->pluck('id')->first();
        if($id){
            $data = BookRoom::where('id',$id)->get();
            return view('student.viewbookdetails', compact('data'));
        }
        
    }

    // show update form 
    public function updateRequest($id){
        $data = BookRoom::find($id);
        $floor = BookRoom::where('id', $id)->pluck('floor')->first();
        $total_room = Room::where('floor', $floor)->pluck('total_room')->first();
        $total_bed = Room::where('floor', $floor)->pluck('total_bed')->first();
        return view('admin.updaterequest', compact('data','total_room','total_bed')); 
    }

    //  update data to database
    public function updateSubmit($id, Request $req){
        // Valildation
        $req->validate([
            'room_no' => 'required',
            'bed_no' => 'required',
            'start_date' => ['required','date','after_or_equal:today', 'before_or_equal:today'],
         ]);
         //receive floor data in the request
        $bed_no = $req->input('bed_no');

        // Select a single column with conditions
        $db_bed = BookRoom::where('bed_no', $bed_no)->pluck('bed_no')->first();
        if($bed_no == $db_bed){
            return redirect()->back()->with('error', 'This bed number is alredy assign. Please choose another bed number.');
        }

         $duration = $req->duration;
         $start = $req->start_date;
         $floor = $req->floor;
         $start_date = Carbon::parse($start);
        // Calculate the end date by adding the duration to the start date
         $end_date = $start_date->addMonths($duration);
    
       
        // Update the record
        $data= BookRoom::find($id);
        $data->room_no = $req->room_no;
        $data->bed_no = $req->bed_no;
        $data->start_date = $start;
        $data->end_date = $end_date;
        $result=$data->save();
        if($result){
            // Update the database to decrease the number of available beds
            Room::where('floor', $floor)->decrement('total_bed');
            return redirect()->route('manageRequest')->with('success','Booking room updated successfully!');
        }else{
            return redirect()->back()->with('error','Sorry, data is not updated!');
        }
         
    }

    
    
}
