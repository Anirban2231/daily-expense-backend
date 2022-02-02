<?php

namespace App\Http\Controllers;
use App\Models\Dailyincome;

use Illuminate\Http\Request;

class DailyIncomesController extends Controller
{
    public function index() {
        return Dailyincome::all();
    }
    public function save_daily_income(Request $request) {
        header('Access-Controll-Allow-Methods: GET,POST,PATCH,PUT,DELETE,OPTIONS');
        header('Access-Controll-Allow-Headers: Origin,Content-type,X-Auth-Token,Authorization,Accept,charset,boundary,Content-Lenght');
        header('Access-Controll-Allow-Origin: *');
        $data =  $request->json()->all(); //read json in request
        
        return Dailyincome::create([
            'income_cat_id' => $data['value']['category'],
            'income_amount' => $data['value']['amount'],
            'created_at'    => $data['value']['date']
        ]);
    }

    public function get_daily_income($income_cat_id){
        $results = Dailyincome::where("income_cat_id",$income_cat_id)->get();
        return $results;
    }

    public function get_daily_income_by_id($id){
        return Dailyincome::find($id);
    }
}
