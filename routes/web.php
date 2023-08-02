<?php
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\TokenVerificationMiddleware;
use Illuminate\Support\Facades\Route;

// User Routes
Route::post('/register', [UserController::class, 'UserRegistration']);
Route::post('/login', [UserController::class, 'UserLogin']);
Route::post('/send-otp', [UserController::class, 'SendOTPCode']);
Route::post('/verify-otp', [UserController::class, 'VerifyOTP']);
Route::post('/reset-password', [UserController::class, 'ResetPassword'])->middleware([TokenVerificationMiddleware::class]);

// User authenticated routes
Route::middleware([TokenVerificationMiddleware::class])->group(function () {
  Route::get('/user-profile', [UserController::class, 'UserProfile']);
  Route::post('/user-update', [UserController::class, 'UpdateProfile']);

  // Customer Routes
  Route::post('/customer-create', [CustomerController::class, 'CustomerCreate']);
  Route::get('/customer-list', [CustomerController::class, 'CustomerList']);
  Route::post('/customer-delete', [CustomerController::class, 'CustomerDelete']);
  Route::get('/customer-by-id', [CustomerController::class, 'CustomerByID']);
  Route::post('/customer-update', [CustomerController::class, 'CustomerUpdate']);

  // Email Routes
  Route::post('/send-emails', [EmailController::class, 'sendEmails']);

  // Category Routes
  Route::post("/create-category", [CategoryController::class, 'CategoryCreate']);
  Route::get("/list-category", [CategoryController::class, 'CategoryList']);
  Route::post("/delete-category", [CategoryController::class, 'CategoryDelete']);
  Route::post("/update-category", [CategoryController::class, 'CategoryUpdate']);
  Route::get("/category-by-id", [CategoryController::class, 'CategoryByID']);

  // Product Routes
  // Product API
  Route::post("/create-product", [ProductController::class, 'CreateProduct']);
  Route::post("/delete-product", [ProductController::class, 'DeleteProduct']);
  Route::post("/update-product", [ProductController::class, 'UpdateProduct']);
  Route::get("/list-product", [ProductController::class, 'ProductList']);
  Route::get("/product-by-id", [ProductController::class, 'ProductByID']);
});

Route::get('/logout', [UserController::class, 'UserLogout']);

// Page Routes
Route::get('/userLogin', [UserController::class, 'LoginPage']);
Route::get('/register', [UserController::class, 'RegistrationPage']);
Route::get('/sendOtp', [UserController::class, 'SendOtpPage']);
Route::get('/verifyOtp', [UserController::class, 'VerifyOTPPage']);
Route::middleware([TokenVerificationMiddleware::class])->group(function () {
  Route::get('/resetPassword', [UserController::class, 'ResetPasswordPage']);
  Route::get('/dashboard', [DashboardController::class, 'DashboardPage']);
  Route::get('/userProfile', [UserController::class, 'ProfilePage']);
  Route::get('/categoryPage', [CategoryController::class, 'CategoryPage']);
  Route::get('/customerPage', [CustomerController::class, 'CustomerPage']);
  Route::get('/productPage', [ProductController::class, 'ProductPage']);
});