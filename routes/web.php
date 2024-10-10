<?php

use App\Http\Controllers\Api\CustomerController as ApiCustomerController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\EmployeeController;
use App\Models\Expense;
use App\Models\Phone;
use App\Models\Post;
use App\Models\Sale;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     $users = DB::table('users')
//         ->join('contacts', 'users.id', '=', 'contacts.user_id')
//         ->join('orders', 'users.id', '=', 'orders.user_id')
//         ->select('users.*', 'contacts.phone', 'orders.price')
//         ->toRawSql();
//     dd($users);

//     return view('welcome');
// });

//Baitap
// Route::get('/', function () {
//     $a1 = DB::table('sales')
//         ->select(DB::raw("SUM(total) as total_sales, EXTRACT(MONTH FROM sale_date) as month, EXTRACT(YEAR FROM sale_date) as year"))
//         ->groupBy(DB::raw("EXTRACT(MONTH FROM sale_date), EXTRACT(YEAR FROM sale_date)"))
//         ->get();
//     $a2 = DB::table('expenses')
//         ->select(DB::raw("SUM(amount) as total_expenses, EXTRACT(MONTH FROM expense_date) as month, EXTRACT(YEAR FROM expense_date) as year"))
//         ->groupBy(DB::raw("EXTRACT(MONTH FROM expense_date), EXTRACT(YEAR FROM expense_date)"))
//         ->get();
//     dd($a1, $a2);
// });

Route::get('/', function () {
    return view('welcome');
});

Route::resource('customers', CustomerController::class);
Route::delete('customers/{customer}/forceDestroy', [CustomerController::class, 'forceDestroy'])
    ->name('customers.forceDestroy');

Route::resource('employees', EmployeeController::class);
Route::delete('employees/{employee}/forceDestroy', [EmployeeController::class, 'forceDestroy'])
    ->name('employees.forceDestroy');

Route::get('/users', function () {
    $data = User::with(['phone'])->paginate();
    return view('user-list', compact('data'));
});

Route::get('/phone/{id}', function ($id) {
    $phone = Phone::with(['user'])->find($id);
    dd($phone->toArray());
});

Route::get('/posts/{id}', function ($id) {
    $post = Post::with(['comments'])->find($id);
    dd($post->toArray());
});

Route::get('/users/{id}/add-role', function ($id) {
    $roles = [1,5,6,8];
    $user = User::find($id);
    $user->roles()->attach($roles);
    dd($user->load('roles')->toArray());
});

Route::get('/users/{id}/remove-role', function ($id) {
    $roles = [1,5,6,8];
    $user = User::find($id);
    $user->roles()->attach($roles);
    dd($user->load('roles')->toArray());
});

Route::get('/users/{id}/sync-role', function ($id) {
    $roles = [3,6,9,10];
    $user = User::find($id);
    $user->roles()->sync($roles);
    dd($user->load('roles')->toArray());
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/movies', function () {
    return view('movies');
})->middleware('checkage');

Route::apiResource('customers', ApiCustomerController::class);