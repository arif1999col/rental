<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Returns;
use App\Booking;
use App\Client;
use App\Car;
use DateTime;

class ReturnController extends Controller
{
    public function index(){
    	$data['menu'] = 6;
    	$data['title'] = 'Returns';
    	$data['booking_data'] = Booking::join('clients', 'clients.client_id', '=', 'bookings.client_id')->join('cars', 'cars.car_id', '=', 'bookings.car_id')->where('status', 'process')->get();
    	$data['no'] = 1;
    	return view('returns.index', $data);
    }

    public function information(Request $request){
    	$booking_code = $request->booking_code;
    	//jika parameter kosong
    	if($booking_code == ''){
    		$request->session()->flash('warning', 'Select data rental from table below');
        	return redirect()->route('returns.index');
    	} 

    	$booking_table = Booking::where('booking_code', $booking_code)->first();
    	//jika booking code tidak ditemukan
    	if($booking_table->count() == 0){
    		$request->session()->flash('warning', 'Data rental not found!');
        	return redirect()->route('returns.index');
    	} 

    	//denda (perhitungannya nambah 10% per harinya)
    	if($booking_table->return_date_supposed <  date('Y-m-d')){	
    		$return_supposed = new DateTime($booking_table->return_date_supposed);
    		$return_now = new DateTime(date('Y-m-d'));
    		$selisih = $return_supposed->diff($return_now);
    		for($i=1; $i<=$selisih->days; $i++){
    			$fine = ($booking_table->price * $i.'0')/100;
    		}
    		$data['fine'] = $fine;
    		$data['late'] = $selisih->days;
    	} else {
    		$data['fine'] = null;
    		$data['late'] = null;
    	}

    	
    	$data['payment'] = Returns::where('booking_code',$booking_code)->get()->first();
    	$data['data'] = $booking_table;
    	$data['client'] = Client::find($booking_table->client_id);
    	$data['car'] = Car::find($booking_table->car_id);
    	$data['total'] = $booking_table->price + $data['fine'] - $data['payment']->amount;
    	$data['title'] = 'Return Process';
    	$data['menu'] = 6;

    	return view('returns.information', $data);
    }

    public function process(Request $request){
    	$validate = $request->validate([
    		'amount' => 'required|min:'.$request->total .'|numeric',
    		'booking_code' => 'required',
    	]);
    	//kalau amount lebih besar dari total, otomatis data total yg jadi value amount
    	//biar ga kelamaan ngitung males gw
    	if($request->amount > $request->total){
    		$request->amount = $request->total;
    	}

    	//dd($request->toArray());

    	//update table booking
    	$update_booking = Booking::where('booking_code', $request->booking_code)->update([
    		'return_date' => date('Y-m-d'),
    		'fine' => $request->fine,
    		'status' => 'paid'
    	]);

    	//add to table payment
    	Returns::create([
    		'type' => $request->type,
    		'amount' => $request->amount,
    		'date' => date('Y-m-d'),
    		'client_id' => $request->client_id,
    		'employees_id' => Auth::user()->id,
    		'booking_code' => $request->booking_code,
    	]);

    	//change car status to available
    	$car = Car::find($request->car_id);
        $car->available = '1';
        $car->save();

        $request->session()->flash('success', 'Return Proccess successfully!');
        return redirect()->route('returns.index');
    }
}
