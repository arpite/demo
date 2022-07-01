<?php

use App\Pages\DashboardPage\DashboardPage;
use Arpite\Authentication\Pages\AuthenticationPages;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

AuthenticationPages::make(
	authenticatedMiddlewares: ["auth:sanctum", "verified"],
	guestMiddlewares: "guest"
)
	->enableRegistration()
	->enablePasswordReset()
	->enableUserEditPage()
	->register();

Route::middleware(["auth:sanctum", "verified"])->group(function () {
	DashboardPage::register();
});
