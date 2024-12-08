<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;
use App\Models\Room;
use App\Models\BookRoom;
use Auth;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
// Init composer autoloader.
require '../vendor/autoload.php';

use RemoteMerge\Esewa\Client;
use RemoteMerge\Esewa\Config;

class PaymentController extends Controller
{   
    // view payment details
    public function viewPaymentDetails(){
            $data = Payment::all();
            return view("admin.viewpayment", compact('data'));
       
    }

    // payment details delete
    public function deletePayment(String $id){
        $data=Payment::find($id);
        $result=$data->delete();
        if($result){
            return redirect()->back()->with('success','Data is Deleted Successfully');

        }  
    }

    // view student payment details
    public function viewStudentPayment(){
        $auth_id = Auth::guard('student')->user()->id;
        $id = Payment::where('sid', $auth_id)->pluck('id')->first();
        if($id){
            $data = Payment::where('id',$id)->get();
            return view('student.viewstudentpayment', compact('data'));
        }
        
    }

    // payment details delete
    public function deleteStudentPayment(String $id){
        $data=Payment::find($id);
        $result=$data->delete();
        if($result){
            return redirect()->back()->with('success','Data is Deleted Successfully');

        }  
    }

    // open booking Form
    public function showBookHostelForm(){
        if(Auth::guard('student')->check()){
            $datas = Room::all();
            return view("student.bookhostelform", compact('datas'));
        }  
    }

    // open eSewa Form
    public function esewa(){
        $price = Session::get('net_price');
        $floor = Session::get('floor');
        return view('student.esewa', compact('price', 'floor'));
    }

    public function bookroom(Request $request)
   {
    // receive all form in the request
    $request->validate([
        'floor' => 'required',
        'duration' => 'required',
        'start_date' => ['required', 'date', 'after_or_equal:today'],
    ]);
    $floor = $request->floor;
    $auth_id = Auth::guard('student')->user()->id;
    $sid = BookRoom::where('sid', $auth_id)->pluck('sid')->first();
    
    if ($auth_id == $sid) {
        return redirect()->back()->with('error', 'Room already Booked');
    }

    $duration = $request->duration;
    $start = $request->start_date;
    $start_date = Carbon::parse($request->start_date);
    
    // Store data in the session
    Session::put('duration', $duration);
    Session::put('start', $start);

    // Calculate the end date by adding the duration to the start date
    $end_date = $start_date->addMonths($duration);
    Session::put('end_date', $end_date);
    // Select a single column with conditions
    $total_bed = Room::where('floor', $floor)->pluck('total_bed')->first();
    
    
    if (empty($total_bed)) {
        return redirect()->back()->with('error', 'No beds available on the selected floor. Please choose another floor.');
    }
    
    $price = Room::where('floor', $floor)->pluck('price')->first();
    $net_price=$price*$duration;
    // Store data in the session
    Session::put('net_price', $net_price);
    Session::put('floor', $floor);
    return redirect()->route('esewa');
    
    // Save the booking details
   }

    public function esewaPay(Request $request)
    {
        
        $pid = uniqid();
        $amount = $request->amount;
        $floor = $request->floor;
        $start = Session::get('start');

        Payment::insert([
            'sid' => $request->sid,
            'name' => $request->name,
            'email' => $request->email,
            'floor' => $floor,
            'product_id' => $pid,
            'amount' => $amount,
            'esewa_status' => 'failed',
            'created_at' => $start,
        ]);



        // set success and failure callback urls
        $successUrl = url('/success');
        $failureUrl = url('/failure');

        // config for development
        $config = new Config($successUrl, $failureUrl);


        // initialize eSewa client
        $esewa = new Client($config);

        $esewa->process($pid, $amount, 0, 0, 0);
    }


    public function esewaPaySuccess()
    {
    //     //do when pay success.
        $pid = $_GET['oid'];
        $refId = $_GET['refId'];
        $amount = $_GET['amt'];
        $payment = Payment::where('product_id', $pid)->first();

        $floor = Payment::where('product_id', $pid)->pluck('floor')->first();
        $name = Payment::where('product_id', $pid)->pluck('name')->first();
        $sid = Payment::where('product_id', $pid)->pluck('sid')->first();
         
        $update_status = Payment::find($payment->id)->update([
            'esewa_status' => 'success',
             'updated_at' => Carbon::now(),
         ]);

         // get data from session
         
         
         $duration = Session::get('duration');
         $end_date = Session::get('end_date');
         $start = Session::get('start');
         

         // here we insert data into book_rooms tables
         BookRoom::insert([
            'sid' => $sid,
            'name' => $name,
            'floor' => $floor,
            'duration' => $duration,
            'price' => $amount,
            'room_no' => 'pending',
            'bed_no' => 'pending',
            'start_date' => $start,
            'end_date' => $end_date,
        ]);

        if ($update_status) {
            //send mail,....
            // $msg = 'Success';
            // $msg1 = 'Payment success. Thank you for making purchase with us.';
            // return view('thankyou', compact('msg', 'msg1'));
            return redirect()->route('bookroom')->with('success', 'Room Booked Successfull!!');
        }
    }

    public function esewaPayFailure()
    {
    //     //do when payment fails.
         echo 'fails';
        $pid = $_GET['pid'];
        $order = Payment::where('product_id', $pid)->first();
        //dd($order);
        $update_status = Payment::find($order->id)->update([
            'esewa_status' => 'failed',
            'updated_at' => Carbon::now(),
        ]);
        if ($update_status) {
            //send mail,....
            //
            // $msg = 'Failed';
            // $msg1 = 'Payment is failed. Contact admin for support.';
            // return view('thankyou', compact('msg', 'msg1'));
            return redirect()->route('bookroom')->with('error', 'Sorry,Payment is failed. Room does not book, contact admin for support');
        }
    }
}
