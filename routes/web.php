<?php

declare(strict_types=1);

use App\Http\Controllers\FlavorController;
use App\Http\Controllers\ShopController;
use Illuminate\Support\Facades\Route;

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

Route::get("/", fn() => view("layout.homepage"))->name("home");

Route::get("/maps", fn() => view("maps.map"));

Route::get("/shops", [ShopController::class, "index"])->name("shops.index");
Route::get("/myshops", [ShopController::class, "indexMyShops"])->name("shops.my");
Route::get("/shops/{id}", [ShopController::class, "show"])->name("shops.id");
Route::post("/addshop", [ShopController::class, "store"])->name("add.shop");
Route::post("/addflavor", [FlavorController::class, "store"])->name("add.flavor");

Route::get("/seller", fn() => view("forms.seller"))->name("seller")->middleware("checkRole:seller");
Route::get("/seller/add", fn() => view("seller.add"))->name("seller.add")->middleware("checkRole:seller");

Route::get("/dashboard", fn() => view("dashboard"))->middleware(["auth"])->name("dashboard");

require __DIR__ . "/auth.php";
