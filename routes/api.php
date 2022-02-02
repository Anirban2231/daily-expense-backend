<?php
use App\Models\DailyExpense;
use App\Models\Dailyincome;
use App\Models\DailyTransaction;
use App\Models\Expensescategory;
use App\Models\Incomecategory;
use App\Http\Controllers\DailyExpenseController;
use App\Http\Controllers\DailyIncomesController;
use App\Http\Controllers\DailyTransactionController;
use App\Http\Controllers\ExpensescategoryController;
use App\Http\Controllers\IncomecategoryController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//Daily Expense
Route::get('/daily_expenses', [DailyExpenseController::class, 'index']);
Route::post('/save_daily_expenses', [DailyExpenseController::class, 'save_daily_expenses']);
Route::get('/get_daily_expenses/{expense_cat_id}', [DailyExpenseController::class, 'get_daily_expenses']);
Route::get('/get_daily_expenses_by_id/{id}', [DailyExpenseController::class, 'get_daily_expenses_by_id']);

//Daily Expense
Route::get('/daily_income', [DailyIncomesController::class, 'index']);
Route::post('/save_daily_income', [DailyIncomesController::class, 'save_daily_income']);
Route::get('/get_daily_income/{income_cat_id}', [DailyIncomesController::class, 'get_daily_income']);
Route::get('/get_daily_income_by_id/{id}', [DailyIncomesController::class, 'get_daily_income_by_id']);

//Daily Transaction
Route::get('/daily_transaction', [DailyTransactionController::class, 'index']);
Route::post('/save_daily_transaction', [DailyTransactionController::class, 'save_daily_transaction']);
Route::get('/get_daily_transaction/{income_id}/{expenses_id}', [DailyTransactionController::class, 'get_daily_transaction']);
Route::get('/get_daily_transaction_by_id/{id}', [DailyTransactionController::class, 'get_daily_transaction_by_id']);

//Expense Category
Route::get('/expenses_category', [ExpensescategoryController::class, 'index']);
Route::post('/save_expenses_category', [ExpensescategoryController::class, 'save_expenses_category']);
Route::get('/get_expenses_category_by_id/{id}', [ExpensescategoryController::class, 'get_expenses_category_by_id']);

//Income Category
Route::get('/income_category', [IncomecategoryController::class, 'index']);
Route::post('/save_income_category', [IncomecategoryController::class, 'save_income_category']);
Route::get('/get_income_category_by_id/{id}', [IncomecategoryController::class, 'get_income_category_by_id']);

//Get Data By Months
Route::get('/get_date_by_months/{month}/{year}', [DailyExpenseController::class, 'get_date_by_months']);
//get all data by current year
Route::get('/get_date_by_year/{year}', [DailyExpenseController::class, 'get_date_by_year']);

//get the yaers from all records

Route::get('/get_all_year', [DailyExpenseController::class, 'get_all_year']);

//get the months from all records

Route::get('/get_all_month', [DailyExpenseController::class, 'get_all_month']);



