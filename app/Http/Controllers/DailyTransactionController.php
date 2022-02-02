<?php

namespace App\Http\Controllers;
use App\Models\DailyTransaction;
use Illuminate\Http\Request;

class DailyTransactionController extends Controller
{
    public function index() {
        return DailyTransaction::all();
    }

    public function save_daily_transaction() {
        return DailyTransaction::create([
            'income_id' => request('income_id'),
            'expenses_id' => request('expenses_id'),
            'main_balance' => request('main_balance'),
        ]);
    }

    public function get_daily_transaction($income_id, $expenses_id){
        //$results = DailyTransaction::where(["income_id", '=', $income_id], ["expenses_id", '=', $expenses_id])->get();
        $results = DailyTransaction::select('*')
        ->where("income_id", '=', $income_id)
        ->where("expenses_id", '=', $expenses_id)
        ->get();
        return $results;
    }

    public function get_daily_transaction_by_id($id){
        return DailyTransaction::find($id);
    }
}
