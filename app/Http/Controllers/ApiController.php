<?php

namespace App\Http\Controllers;
use DB;
use App\Business;
use Illuminate\Http\Request;

class ApiController extends Controller
{
      static public function business($id)
      {
          //
          try {
              $business = Business::where("business_id",$id)->get()->count();
              return response()->json([
                  "status" => "OK",
                  "business_id" => $id,
                  "business" => $business,
              ]);
          }
          catch (Exception $e) {
              return response()->json([
                  "status" => "ERROR",
                  "message" => $e->getMessage()
              ]);
          }
      }


      




}
