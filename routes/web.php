<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
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

Route::get("/", [HomeController::class, "index"]);


Route::get("/home", [HomeController::class, "redirect"])->middleware("auth", "verified");
Route::get("/logout", [HomeController::class, "logoutUser"]);
Route::get("/show_appointment", [HomeController::class, "show_appointment"]);
Route::post("/appointment", [HomeController::class, "appointment"]);
Route::get("/my_appointment", [HomeController::class, "my_appointment"]);
Route::get("/cancel_appointment/{id}", [HomeController::class, "cancel_appointment"]);
Route::get("/edit_appointment/{id}", [HomeController::class, "edit_appointment"]);
Route::put("/update_appointment/{id}", [HomeController::class, "update_appointment"]);
Route::get("about", [HomeController::class, "about"]);
Route::get("/doctor_view", [HomeController::class, "doctor_view"]);
Route::get("/news", [HomeController::class, "news"]);
Route::get("/contact", [HomeController::class, "contact"]);
Route::post("/send_contact", [HomeController::class, "send_contact"]);
Route::get("/news_details", [HomeController::class, "news_details"]);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
Route::get("/admin_logout", [AdminController::class, "destroy"]);
Route::get("/add_doctor_view", [AdminController::class, "add_doctor_view"]);
Route::post("/add_doctor_view", [AdminController::class, "add_doctor"]);
Route::get("/view_appointment", [AdminController::class, "view_appointment"]);
Route::get("/approve_appointment/{id}", [AdminController::class, "approve_appointment"]);
Route::get("/cancel_appointment/{id}", [AdminController::class, "cancel_appointment"]);
Route::get("/all_doctors", [AdminController::class, "all_doctors"]);
Route::get("/delete_doctor/{id}", [AdminController::class, "delete_doctor"]);
Route::get("/edit_doctor/{id}", [AdminController::class, "edit_doctor"]);
Route::put("/update_doctor/{id}", [AdminController::class, "update_doctor"]);
Route::get("/email_view/{id}", [AdminController::class, "email_view"]);
Route::post("/sendEmailNotification/{id}", [AdminController::class, "sendEmailNotification"]);
Route::get("/view_users", [AdminController::class, "view_users"]);
Route::get("/delete_user/{id}", [AdminController::class, "delete_user"]);
Route::get("/edit_user/{id}", [AdminController::class, "edit_user"]);
Route::post("/update_user/{id}", [AdminController::class, "update_user"]);

Route::get("/view_contacts", [AdminController::class, "view_contacts"]);
Route::get("/delete_contact/{id}", [AdminController::class, "delete_contact"]);
Route::get("/admin_details", [AdminController::class, "admin_details"]);
Route::get("/add_news_view", [AdminController::class, "add_news_view"]);
Route::post("/add_news", [AdminController::class, "add_news"]);

