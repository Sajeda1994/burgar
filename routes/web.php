<?php

use App\Http\Controllers\AppetizersController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DrinkController;
use App\Http\Controllers\MealController;
use App\Http\Controllers\TableController;
use App\Models\appetizers;
use App\Models\category;
use App\Models\drink;
use App\Models\meal;
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
            $appets=appetizers::all();
            $drinks=drink::all();
            return view('welcome',compact('categorys','meals','appets','drinks'));
        });

        Route::resource('meal',MealController::class);

        Route::resource('appetizers',AppetizersController::class);

        Route::resource('drink',DrinkController::class);

        Route::resource('category', CategoryController::class);

        Route::resource('table',TableController::class);


        Route::get('admindash',function(){
            return view('dashboard.dashboard');
        })->middleware(['auth']);

        Route::get('/profile',function(){
            return view('dashboard.profile');
        });

        Route::get('/allmenu',function(){
            $categorys=category::all();
            $meals=meal::all();
            $appets=appetizers::all();
            $drinks=drink::all();
            return view('landing.allmenu',compact('categorys','meals','appets','drinks'));
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
            $appets=appetizers::all();
            $categorys=category::all();
            return view('outherpages.appetizerspage',compact('appets','categorys'));
        });

        Route::get('/drinkspage',function(){
            $categorys=category::all();
            $drinks=drink::all();

            return view('outherpages.drinkspage',compact('categorys','drinks'));
        });


       




    });
   