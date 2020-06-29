<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use App\Client;
use App\Car;
use App\Booking;
use App\Returns;

class BookingController extends Controller
{
    public function index(){
        $data['menu'] = 5;
        $data['title'] = 'Booking';
        $data['cars'] = Car::where('available', "1")->get();
        return view('booking.index', $data);
    }

    public function listMember(){
        $get = $_GET['data'];
        $data = DB::table('clients')->where('name', 'like', "%$get%")->get();
    
		$output = "<ul class='ul-client'>";
		if(count($data) != 0){
			foreach($data as $row){
				$output .= "<li class='li-client'>".$row->client_id. " - ". $row->name ."</li>";
			}
		} else {
			$output .= '<li class="li-client-null">Not Register Yet? <a href="" data-toggle="modal" data-target="#clientModal">Click here to add</a></li>';
		}

		echo $output;
    }

    public function createClient(request $request){
        $validate = $request->validate([
            'name' => 'required|string|max:150',
            'nik' => 'required|integer|unique:clients',
            'dob' => 'required',
            'phone' => 'required|max:15',
            'gender' => 'required',
        ]);

        if($validate) {
            $insert = Client::create($request->toArray());
            $request->session()->flash('success', 'Add client success! Type that name in form below');
            return redirect()->route('booking.index');
        }
    }

    public function calculate(Request $request){
        //validate 
        $validate = $request->validate([
            'booking_code' => 'required|unique:bookings',
            'order_date' => 'required',
            'duration' => 'required',
        ]);

        //get return date
        $order_duration = $request->duration;
        $order_date = $request->order_date;
        $return_date = date('Y-m-d', strtotime('+'.$order_duration.' days', strtotime($order_date)));

        //get price total
        $car = Car::find($request->car_id);
        $total_price = $car->price * $order_duration;

        //get dp minimum (30% from the price total)
        $dp = ($total_price * 10) / 50;

        //get input 
        $data = $request->toArray();

        //get client
        $client = Client::find($request->client_id);

        $title = 'Detail Order';
        $menu = '5';
        
        return view('booking.details', compact('return_date', 'data', 'total_price', 'car', 'dp', 'title', 'menu', 'client'));
        
    }

    public function process(Request $request){
        //validate 
        $validate = $request->validate([
            'booking_code' => 'required|unique:bookings',
            'order_date' => 'required',
            'duration' => 'required',
            'client_id' => 'required|integer',
            'car_id' => 'required|integer',
            'duration' => 'required|integer',
            'return_date_supposed' => 'required',
            'price' => 'required|integer',
            'employees_id' => 'required',
            'type' => 'required',
            'amount' => 'required|integer'
        ]);
       


        //insert to table booking first
        $insert_booking = Booking::create([
            'booking_code' => $request->booking_code,
            'order_date' => $request->order_date,
            'duration' => $request->duration,
            'return_date_supposed' => $request->return_date_supposed,
            'price' => $request->price,
            'status' => 'process',
            'employees_id' => $request->employees_id,
            'car_id' => $request->car_id,
            'client_id' => $request->client_id,
        ]);

        //insert to payment
        $insert_payment = Returns::create([
            'type' => $request->type,
            'amount' => $request->amount,
            'date' => date('Y-m-d'),
            'client_id' => $request->client_id,
            'employees_id' => $request->employees_id,
            'booking_code' => $request->booking_code
        ]);

        //update car status to not available (0)
        $car = Car::find($request->car_id);
        $car->available = '0';
        $car->save();

        $request->session()->flash('success', 'Add Transaction success!');
        return redirect()->route('booking.index');
    }
}
