<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Postcode;
use App\Exceptions\IdenticalCodesException;
use App\Exceptions\CodeNotFoundException;

class CodesController extends Controller
{
    public function index(){
        return view('home.index');
    }

    public function getCodes(Request $request){
        // Getting two codes
        $code1 = $request->input('code_one');
        $code2 = $request->input('code_two');

        // Checking if the user enters same postcodes
        if($code1 === $code2){
            throw new IdenticalCodesException();
        }

        //Finding from DB
        // Latitudes
        $lat1 = PostCode::findOrFail($code1)->latitude;
        $lat2 = PostCode::findOrFail($code2)->latitude;

        // Longitudes
        $lon1 = PostCode::findOrFail($code1)->longitude;
        $lon2 = PostCode::findOrFail($code2)->longitude;

        $distance = $this->distance($lat1, $lon1, $lat2, $lon2);
        return view('home.index', ['distance'=>$distance]);
        
    }

    // Using Geodata formula
    private function distance($lat1, $lon1, $lat2, $lon2, $unit="m") {
          $theta = $lon1 - $lon2;
          $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
          $dist = acos($dist);
          $dist = rad2deg($dist);
          $miles = $dist * 60 * 1.1515;
          $unit = strtoupper($unit);
      
          if ($unit == "K") {
            return ($miles * 1.609344). " Kilometers";
          } else if ($unit == "N") {
            return ($miles * 0.8684). "  Nautical Miles";
          } else {
            return round($miles). "  Miles";
          }
        }
}
