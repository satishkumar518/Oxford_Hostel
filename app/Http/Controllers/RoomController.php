<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Room;
use Auth;

class RoomController extends Controller
{
    public function addroom(){
        return view('admin.addroom');
    }

    // insert/store data into the database
    public function insert(Request $req){
        
        $req->validate([
           'floor' => 'required',
           'room_no' => 'required|max:10',
           'bed_no' => 'required',
           'price' => 'required|integer',
        ]);

        //receive floor data in the request
        $floor = $req->input('floor');

        // Select a single column with conditions
        $db_floor = Room::where('floor', $floor)->pluck('floor')->first();
        if($floor == $db_floor){
            return redirect()->back()->with('error', 'This floor is alredy stored in database. Please choose another floor.');
        }

        

        $data=new Room();
        $data->floor = $floor;
        $data->total_room = $req->room_no;
        $data->total_bed = ($req->room_no)*($req->bed_no);
        $data->price = $req->price;
        $result=$data->save();
        if($result){
            return redirect()->route('manageroom')->with('success','Room added successfully!');
        }else{
            return redirect()->back()->with('error','Sorry, data is not added!');
        }

    }

    // view all details about rooms
    public function manageroom(){
        $data=Room::all();
        return view('admin.manageroom', compact('data'));
    }

    // delete data 
    public function delete(String $id){
        $data=Room::find($id);
        $result=$data->delete();
        if($result){
            return redirect()->back()->with('success','Data is Deleted Successfully');

        }
        
        
    }

    // edit data
    public function editroom($id){
        $data = Room::find($id);
        return view("admin.editroom", compact('data'));
       
    }
    
    # Function to update room data
    public function updateroom($id, Request $req)
    {
        
        // Valildation
        $req->validate([
            'floor' => 'required',
            'room_no' => 'required',
            'bed_no' => 'required',
            'price' => 'required',
         ]);
       
        // Update the record
        $data= Room::find($id);
        $data->floor = $req->floor;
        $data->total_room = $req->room_no;
        $data->total_bed = ($req->room_no)*($req->bed_no);
        $data->price = $req->price;
        $result=$data->save();
        if($result){
            return redirect()->route('manageroom')->with('success','Room updated successfully!');
        }else{
            return redirect()->back()->with('error','Sorry, data is not updated!');
        }
    }

    
}
