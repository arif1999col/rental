<?php

namespace App\Http\Controllers;
USE DB;
use App\Booking;
use App\Car;
use App\Client;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tes = \App\Booking::all();
        $title = "Dashboard";
        $car = \App\Car::all();
        $menu = 0;
        $categorie =[];
        $data=[];
        foreach($car as $row){
            $categorie[] = $row->car_name;
            $data[] = $count = DB::table('bookings')->where('car_id',$row->car_id)->count();
        }  
        return view('home',['car'=>$car,'categorie'=>$categorie,'data'=>$data] ,compact('title', 'menu'));
    }
}
