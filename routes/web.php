<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Middleware\IsAuthenticated;
use App\Http\Middleware\IsNotAuthenticated;
use App\Http\Middleware\IsVerified;
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



Route::get('/', function () {
    return view('home');
});



Route::controller(AuthController::class)->group(function(){

    Route::middleware(IsNotAuthenticated::class)->group(function(){
        Route::get("register","register")->name("auth.register");
        Route::post("register","store")->name("auth.store");
        Route::get("login","login")->name("auth.login");
        Route::post("login","check")->name("auth.check");

        //reset password
        Route::get("forgotPassword","forgotPassword")->name("auth.forgotPassword");
        Route::post("check-email","checkEmail")->name("auth.checkEmail");
        Route::get("new-resetPassword","newResetPassword")->name("auth.newResetPassword");
        Route::post("reset-password","resetPassword")->name("auth.resetPassword");
    });

    Route::middleware(IsAuthenticated::class)->group(function(){
        Route::post("logout","logout")->name("auth.logout");

        Route::middleware(IsVerified::class)->group(function(){
            Route::get("/change-password","changePassword")->name("auth.change-password");
            Route::post("/password-change","passwordChange")->name("auth.password-change");
        });

        Route::get("/verify-email","verifyEmail")->name("auth.verify-email");
        Route::post("/email-verify","emailVerify")->name("auth.email-verify");
    });

});

Route::middleware(IsAuthenticated::class)->group(function(){
    Route::prefix("dashboard")->controller(HomeController::class)->group(function(){
        Route::get("home","home")->name("dashboard.home");
    });
    //Route::resource("profile_setting",ProfileController::class);

});
