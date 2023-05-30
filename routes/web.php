<?php

use App\Http\Controllers\ComputersController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StaticController;

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

Route::get('/', [StaticController::class, 'index'])->name('home.index');

Route::get('/about', [StaticController::class, 'about'])->name('home.about');

Route::get('/contact', [StaticController::class, 'contact'])->name('home.contact');

Route::resource('computers', ComputersController::class);



// Route::get('/store', function (){
//     $filter = request('style');
//     if(isset($filter)){
//         return 'The viewing shows <span style="color: red">'.$filter.'</span>';
//     }
//     return 'The viewing shows <span style="color: red">All Products</span>';

// });

Route::get('/store/{category?}/{item?}', function ($category = null, $item = null){
    if(isset($category)){
        if(isset($item)){
            return "<h1>{$item}</h1>";
        }
        return '<h1>'.$category.'</h1>';
    }
    return '<h1>STORE</h1>';
});
