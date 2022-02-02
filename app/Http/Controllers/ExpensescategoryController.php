<?php

namespace App\Http\Controllers;
use App\Models\Expensescategory;
use Illuminate\Http\Request;

class ExpensescategoryController extends Controller
{
    public function index() {
        return Expensescategory::all();
    }

    public function save_expenses_category() {
        return Expensescategory::create([
            'expenses_cat_name' => request('expenses_cat_name')
        ]);
    }

    public function get_expenses_category_by_id($id){
        return Expensescategory::find($id);
    }
}
