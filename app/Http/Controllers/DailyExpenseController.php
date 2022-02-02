<?php

namespace App\Http\Controllers;
use App\Models\DailyExpense;
use App\Models\Dailyincome;
use App\Models\DailyTransaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class DailyExpenseController extends Controller
{
    public function index() {
        return DailyExpense::all();
    }

    public function save_daily_expenses(Request $req) {
        header('Access-Controll-Allow-Methods: GET,POST,PATCH,PUT,DELETE,OPTIONS');
        header('Access-Controll-Allow-Headers: Origin,Content-type,X-Auth-Token,Authorization,Accept,charset,boundary,Content-Lenght');
        header('Access-Controll-Allow-Origin: *');
        $data =  $req->json()->all(); //read json in request
        return DailyExpense::create([
            'expense_cat_id' => $data['value']['category'],
            'expense_amount' => $data['value']['amount'],
            'created_at'    => $data['value']['date']
        ]);
    }
    
    public function get_daily_expenses($expense_cat_id){
       $results = DailyExpense::where("expense_cat_id",$expense_cat_id)->get();
       return $results;
    }

    public function get_daily_expenses_by_id($id){
        return DailyExpense::find($id);
     }
     public function get_date_by_months($month, $year){
       
        $expence = DailyExpense::select('*')           
        ->whereMonth('created_at', '=', $month)
        ->get()->sum('expense_amount');

        $income = Dailyincome::select('*')        
        ->whereMonth('created_at', '=', $month)
        ->get()->sum('income_amount');;

        $transaction = DailyTransaction::select('*')        
        ->whereMonth('created_at', '=', $month)
        ->get();

        $balance = $income - $expence;

        $arr = array(
            'expence'       => $expence,
            'income'        => $income,
            'balance'   => $balance,
            
        );

        return $arr;
     }

     public function get_date_by_year($year){

        $expence = DailyExpense::select('*')           
        ->whereYear('created_at', '=', $year)
        ->get()->sum('expense_amount');

        $income = Dailyincome::select('*')        
        ->whereYear('created_at', '=', $year)
        ->get()->sum('income_amount');;

        $transaction = DailyTransaction::select('*')        
        ->whereYear('created_at', '=', $year)
        ->get();

        
        $balance = $income - $expence;

        $arr = array(
            'expence'       => $expence,
            'income'        => $income,
            'balance'   => $balance,
            
        );

        return $arr;
     }

     public function get_all_year(){

        $records = Dailyincome::select(DB::raw('YEAR(created_at) as year'))->distinct()->get();
        $years = $records->pluck('year');
        $arr = array(

            'years' => $years
        );
        
        return $arr;

        
     }

     public function get_all_month(){

        $records = Dailyincome::select(DB::raw('MONTH(created_at) as month'))->distinct()->get();
        $months =  $records->pluck('month');

        $arr = array(

            'months' => $months
        );

        return $arr;
       
     }
}
