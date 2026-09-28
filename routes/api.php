<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\GardenController;


use App\Http\Controllers\Api\MedicineController;
use App\Http\Controllers\Api\PlantController;
use App\Http\Controllers\Api\GardenPlantController;
use App\Http\Controllers\Api\ActivityHistorieController;
use App\Http\Controllers\Api\ProcedureController;
use App\Http\Controllers\Api\MedicationTreatmentController;
use App\Http\Controllers\Api\WarningController;
use App\Http\Controllers\Api\RecommendationController;
use App\Http\Controllers\Api\CareRecordController;
use App\Http\Controllers\Api\PlantCareController;
use App\Http\Controllers\Api\PestPlantController;
use App\Http\Controllers\Api\PlagueSymptomController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\ImagePlantController;
use App\Http\Controllers\Api\ImagePlagueController;
use App\Http\Controllers\Api\SymptomController;
use App\Http\Controllers\Api\TreatmentController;
use App\Http\Controllers\Api\PlagueController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/



// Esta ruta requiere un usuario autenticado mediante Sanctum.
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Cada apiResource crea automáticamente index, store, show, update y destroy.
// Cada apiResource crea las rutas index, store, show, update y destroy.
Route::apiResource('garden', GardenController::class);
Route::apiResource('medicine', MedicineController::class);
Route::apiResource('plant', PlantController::class);
Route::apiResource('gardenplant', GardenPlantController::class)
    // Ajusta el parámetro para que coincida con el modelo garden_plant.
    ->parameters(['gardenplant' => 'garden_plant']);
Route::apiResource('activityhistorie', ActivityHistorieController::class);
Route::apiResource('procedure', ProcedureController::class);
Route::apiResource('medicationtreatment', MedicationTreatmentController::class);
Route::apiResource('warning', WarningController::class);
Route::apiResource('recommendation', RecommendationController::class);
Route::apiResource('carerecord', CareRecordController::class)
    // Ajusta el parámetro para que coincida con el modelo care_record.
    ->parameters(['carerecord' => 'care_record']);
Route::apiResource('plantcare', PlantCareController::class);
Route::apiResource('pestplant', PestPlantController::class);
Route::apiResource('plaguesymptom', PlagueSymptomController::class);
Route::apiResource('user', UserController::class);
Route::apiResource('imageplant', ImagePlantController::class);
Route::apiResource('imageplague', ImagePlagueController::class);
Route::apiResource('symptom', SymptomController::class);
Route::apiResource('treatment', TreatmentController::class);
Route::apiResource('plague', PlagueController::class);
