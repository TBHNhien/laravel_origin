<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\FoodsController;

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

Route::get('/', [PagesController::class, 'index']);
Route::get('/about', [PagesController::class, 'about']);
Route::get('/posts', [PostsController::class, 'index']);
Route::resource('/foods',FoodsController::class);

// Route::get('products', [
//     ProductsController::class,
//     'index'
// ])->name('products');

// Route::get('/products', [ProductsController::class, 'index'])->name('products');


//route có tham số 
Route::get('products/{productName}/{id}', [
    ProductsController::class,
    'detail'
])->where([
    'productName','[A-Za-z0-9]+',
    'id','[0-9]+'
]);

// ->where('id', '[A-Za-z0-9]+')




/*
Route::get('/', function () {
    return view('home');
    // return env('MY_NAME');
});



Route::get('/users',function(){
    return 'This is the users page';
});


//mảng
Route::get('/foods',function(){
    return ['sushi','sashimi','tofu'];
});

//object
Route::get('/aboutMe',function(){
    return response()->json([
        'name' => 'Thai Bao Hao Nhien',
        'email' =>'thaibaohaonhien1995@gmail.com'
    ]);
});

//điều hướng sang trang khác 
Route::get('/something',function(){
    return redirect('/');
});
*/




