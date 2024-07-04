<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MealController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\TableController;
use App\Models\category;
use App\Models\meal;
use App\Models\order;
use App\Models\table;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;


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



Auth::routes();



Route::group(
    [
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function(){  

        Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


        Route::get('/', function () {
            $categorys=category::all();
            $meals=meal::all();
            $macadd=Str::substr(shell_exec('getmac'),159,20);
            $exorder=order::where('user_mac',$macadd)->with(['meal'])->first();
            $count=$exorder->meal->count();
            return view('welcome',compact('categorys','meals','count'));
        });

        Route::resource('meal',MealController::class);

        Route::resource('category', CategoryController::class);

        Route::resource('table',TableController::class);

        Route::resource('/order',OrderController::class);


        Route::post('/order/create',[OrderController::class,'create']);

        Route::get('/user.order.orderdetailsforuser',[OrderController::class,'getorderdetails']);

        Route::get('admindash',function(){
            return view('dashboard.dashboard');
        })->middleware(['auth']);

        Route::get('/profile',function(){
            return view('dashboard.profile');
        });

        Route::get('/allmenu',function(){
            $categorys=category::all();
            $meals=meal::all();
            return view('landing.allmenu',compact('categorys','meals'));
        });

        Route::get('/aboutus',function(){
            return view('outherpages.aboutus');
        });

        Route::get('/booktable',function(){
            return view('outherpages.booktable');
        });

        Route::get('/setting',function(){
            return view('dashboard.setting');
        });

        Route::get('/burgerpage',function(){
            $meals=meal::all();
            $categorys=category::all();
            return view('outherpages.burgerpage',compact('meals','categorys'));
        });

        Route::get('/pizzapage',function(){
            $categorys=category::all();
            $meals=meal::all();

            return view('outherpages.pizzapage',compact('categorys','meals'));
        });

        Route::get('/pastapage',function(){
            $categorys=category::all();
            $meals=meal::all();
            return view('outherpages.pastapage',compact('categorys','meals'));
        });

        Route::get('/appetizerspage',function(){
            $categorys=category::all();
            $meals=meal::all();
            return view('outherpages.appetizerspage',compact('categorys','meals'));
        });

        Route::get('/drinkspage',function(){
            $categorys=category::all();
            $meals=meal::all();
            return view('outherpages.drinkspage',compact('categorys','meals'));
        });


       




    });
   