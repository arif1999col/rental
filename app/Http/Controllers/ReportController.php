<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Booking;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function index(Request $request){
    	$data['menu'] = 7;
    	$data['title'] = "Report Transcation";
    	$data['no'] = 1;

    	if(!isset($_GET['type'])) {
	    	return view('report/index', $data);
    	} else {
    		$data['data'] = $request->toArray();
    		switch ($request->type) {
    			case 'all':
    				$data['bookings'] = Booking::whereBetween('order_date', [$request['start_date'], $request['end_date']])
    				->join('clients', 'clients.client_id', '=', 'bookings.client_id')
    				->join('cars', 'cars.car_id', '=', 'bookings.car_id')
    				->get();
    				break;
    			case 'process' :
    				$data['bookings'] = Booking::where('status', 'process')->whereBetween('order_date', [$request['start_date'], $request['end_date']])
    				->join('clients', 'clients.client_id', '=', 'bookings.client_id')
    				->join('cars', 'cars.car_id', '=', 'bookings.car_id')
    				->get();
    				break;
    			case 'paid' :
    				$data['bookings'] = Booking::where('status', 'paid')->whereBetween('order_date', [$request['start_date'], $request['end_date']])
    				->join('clients', 'clients.client_id', '=', 'bookings.client_id')
    				->join('cars', 'cars.car_id', '=', 'bookings.car_id')
    				->get();
    				break;
    		}
    		if($request->type == 'all'){
    			
    		} else if($request->type == 'process'){

    		}
    		
    		return view('report/transaction', $data);
    	}
    	
    }
}
