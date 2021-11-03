<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::apiResources([
    "account" => "AccountController",
    "admin" => "AdminController",
    "farmer" => "FarmerController",
    "batche" => "BatcheController",
    "breed" => "BreedController",
    "disease" => "DiseaseController",
    "expense" => "ExpensesController",
    "food" => "FoodController",
    "foodStock" => "FoodsStockController",
    "foodType" => "FoodsTypeController",
    "healthSchedule" => "HealthScheduleController",
    "itemsToSale" => "ItemsToSaleController",
    "itemsToTake" => "ItemsToTakeController",
    "medication" => "MedicationController",
    "mortality" => "MortalityController",
    "sale" => "SaleController",
    "slaughter" => "SlaughtersController",
    "specie" => "SpecieController",
    "stateSchedule" => "StatusScheduleController",
    "stockItemsToSale" => "StockItemsToSaleController",
    "vaccination" => "VaccinationController",
    "avgAnimalWeight" => "AvgAnimalWeightController"
]);
