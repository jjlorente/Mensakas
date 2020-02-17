<?php

namespace App\Http\Controllers;
use DB;
use App\Consumer;
use App\Business;
use Illuminate\Http\Request;

class SimulatorController extends Controller
{
    //
     public function index(Request $request)
    {
        //

        return view('simulador.index');
    }

     public function businessLocation(Request $request)
    {
        //
        $this->validate($request,[ 'first_name'=>'required', 'phone'=>'required', 'email'=>'required','location'=>'required' ,'address'=>'required', 'phone'=>'required']);
        $location = $request->get('location');
        $business = Business::where('location', $location)->get();
        return view('simulador.businessLocation',compact('business','location'));
    }

}
