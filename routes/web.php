<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BatchOrderController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\QuotationController;
use App\Http\Controllers\QuoteRequestController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\UserController;
use App\Repositories\AdminRepository;
use App\Models\Product;
use App\Models\Order;
use App\Models\BatchOrder;
use App\Models\Category;
use App\Models\QuoteRequest;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', function () {
    return view('welcome');
});


Route::get('/products', 'ProductController@allProducts')->name('products.allProducts');
Route::view('/faq','pages.customer.faq')->name('faq');
Route::view('/get_quote','pages.customer.get_quote')->name('get_quote');
Route::view('/sign_up','pages.customer.sign_up')->name('sign_up'); # sign up view
Route::post('/sign_up', [UserController::class, 'store'])->name('sign_up.store');
Route::get('/cart/{productId}',[ProductController::class,'productDetails']);
Route::get('/carts', function () {
    $cusId=Auth::user()->people->id;
    $carts = Cart::with('product')->where('customer_id', $cusId)->where('status', 1)->get();
    return view('pages.customer.carts')->with('carts', $carts);
})->middleware(['auth'])->name('cart_list');


Route::get('/track_order', function () {
    $cusId=Auth::user()->people->id;
    $orders = BatchOrder::with('people')->where('customer_id', $cusId)->get();
    return view('pages.customer.track_order')->with('orders', $orders);
})->middleware(['auth'])->name('order_list');
// Route::view('/track_order','pages.customer.track_order')->name('track_order');

Route::middleware('guest')->group(function(){
    Route::view('/home','layouts.app')->name('home');
    Route::view('/login','pages.login')->name('login');
    Route::post('/login',[AuthController::class,'login'])->name('login')->middleware('throttle:3,1');
});


Route::get('/category/{categoryId}',[CategoryController::class,'categoryDetails']);

Route::middleware('auth')->group(function(){
    Route::view('/dashboard','pages.dashboard.dashboard')->name('dashboardView');
    
    Route::post('/request_quote', [QuoteRequestController::class, 'store'])->name('request_quote.store');

    #productController
    Route::get('/product/{productId}',[ProductController::class,'productDetails']);
    
    #customer_cart
    Route::get('/cart_count/{cusId}',[CartController::class,'cartCount']);
    Route::post('/carts', [CartController::class, 'store'])->name('carts.store');
    Route::post('/carts/status-1/{id}',[CartController::class,'updateCartStatusOne']); 
    Route::post('/carts/status-0/{id}',[CartController::class,'updateCartStatusZero']); 
     #customer_orders
    Route::post('/orders', [OrderController::class, 'store'])->name('orders.store');
    Route::get('/batch_order/{orderId}',[OrderController::class,'batchOrderDetails']);
    Route::get('/granted_quote',[QuotationController::class,'grantedQuote']);
    
    Route::get('/logout',[AuthController::class,'logout'])->name('logout');


    Route::prefix('/admin')->group(function(){
        
        
        Route::get('/validate/email',[AdminController::class,'validateEmail']);
        Route::get('/users',[AdminController::class,'viewUsers']);
        Route::get('/view/user',[AdminController::class,'viewUserUI'])->name('view-user');
        Route::post('/update/profile/credentials/{id}',[AdminController::class,'updateUserCredentials']); 
        Route::post('/update/profile/information/{id}',[AdminController::class,'updateUserInformation']); 
        Route::get('/profile/{id}',[AdminController::class,'viewUsersProfile'])->name('user.profile'); 
        Route::get('/change-password/{id}',[AdminController::class,'updateUserCredential'])->name('user.change-password');

        Route::get('/dashboard',[AuthController::class,'dashboard'])->name('dashboard'); 
        
        #quote_requests
        Route::view('/quote_requests','pages.tables.request_table')->name('viewRequests'); 
        Route::get('/quote_requests', function () {
            $quote_requests = QuoteRequest::all();
            return view('pages.tables.request_table',['quote_requests' => $quote_requests]);
        });
        Route::get('/quote_requests', 'QuoteRequestController@index')->name('quote_requests.index');
        #quotations
        Route::view('/quotations','pages.tables.quotation_table')->name('viewQuotations'); 
        Route::post('/quotations', [QuotationController::class, 'store'])->name('quotations.store');
        Route::get('/quotations', function () {
            $quotations = Quotation::all();
            return view('pages.tables.quotation_table',['quotations' => $quotations]);
        });
        Route::get('/quotations', 'QuotationController@index')->name('quotations.index');

        #users
        Route::view('/users','pages.tables.user_table')->name('viewUsers'); 
        Route::post('/users', [UserController::class, 'store'])->name('users.store');
        Route::get('/users', function () {
            $users = User::all();
            return view('pages.tables.user_table',['users' => $users]);
        });
        Route::get('/users', 'UserController@index')->name('users.index');

        #reviews
        Route::view('/reviews','pages.tables.review_table')->name('viewReviews');
        Route::post('/reviews', [ReviewController::class, 'store'])->name('reviews.store');
        Route::get('/reviews', function () {
            $reviews = Review::all();
            return view('pages.tables.review_table',['reviews' => $reviews]);
        });
        Route::get('/reviews', 'ReviewController@index')->name('reviews.index');

        #categories
        Route::view('/categories','pages.tables.category_table')->name('viewCategories'); 
        Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
        Route::get('/categories', function () {
            $categories = Category::all();
            return view('pages.tables.category_table',['categories' => $categories]);
        });
        Route::get('/categories', 'CategoryController@index')->name('categories.index');

        #products
        Route::view('/products', 'pages.tables.product_table')->name('viewProducts');
        Route::post('/products', [ProductController::class, 'store'])->name('products.store');
        Route::get('/products', function () {
            $products = Product::all();
            return view('pages.tables.product_table',['products' => $products]);
        });
        Route::get('/products', 'ProductController@index')->name('products.index');

        #orders
        Route::view('/orders','pages.tables.order_table')->name('viewOrders'); 
        Route::get('/orders', function () {
            $batch_orders = BatchOrder::with('people')->get();
            return view('pages.tables.order_table',['batch_orders' => $batch_orders]);
        });
        Route::get('/orders', 'BatchOrderController@index')->name('batch_orders.index');
        Route::post('/orders', [BatchOrderController::class, 'store'])->name('batch_orders.store');
        Route::post('/orders/status-2/{batchId}',[BatchOrderController::class,'orderProduction']); 
        Route::post('/orders/status-3/{batchId}',[BatchOrderController::class,'shippedOut']); 
        Route::post('/orders/status-4/{batchId}',[BatchOrderController::class,'forDelivery']); 
        Route::post('/orders/status-5/{batchId}',[BatchOrderController::class,'delivered']); 
        
    });

    Route::get('/profile',[AdminController::class,'viewUsersProfile'])->name('profile');
    Route::get('/change-password',[AdminController::class,'updateUserCredential'])->name('profile.change-password');

     Route::prefix('/email')->name('email.')->group(function(){
        Route::get('/list',[EmailController::class,'getEmails']);
        Route::get('/details/{email_id}',[EmailController::class,'emailDetails']);
     });
        
});