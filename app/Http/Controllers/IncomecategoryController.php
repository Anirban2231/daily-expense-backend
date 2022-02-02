<?php

namespace App\Http\Controllers;
use App\Models\Incomecategory;
use Illuminate\Http\Request;

class IncomecategoryController extends Controller
{
    public function index() {
        return Incomecategory::all();
    }

    public function save_income_category() {
        return Incomecategory::create([
            'income_category_name' => request('income_category_name')
        ]);
    }

    public function get_income_category_by_id($id){
        return Incomecategory::find($id);
    }
}
