<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\GardenPlantController;
Route::get('gardenplant/list', [GardenPlantController::class, 'index'])->name('gardenplant.index');
Route::get('gardenplant/create', [GardenPlantController::class, 'create'])->name('gardenplant.create');
Route::get('gardenplant/{garden_plant}', [GardenPlantController::class, 'show'])->name('gardenplant.show');
Route::post('gardenplant/store', [GardenPlantController::class, 'store'])->name('gardenplant.store');
Route::get('gardenplant/{garden_plant}/edit', [GardenPlantController::class, 'edit'])->name('gardenplant.edit');
Route::put('gardenplant/{garden_plant}', [GardenPlantController::class, 'update'])->name('gardenplant.update');
Route::delete('gardenplant/{garden_plant}', [GardenPlantController::class, 'destroy'])->name('gardenplant.destroy');

use App\Http\Controllers\ActivityHistorieController;
Route::get('activityhistorie/list', [ActivityHistorieController::class, 'index'])->name('activityhistorie.index');
Route::get('activityhistorie/create', [ActivityHistorieController::class, 'create'])->name('activityhistorie.create');
Route::get('activityhistorie/{activity}', [ActivityHistorieController::class, 'show'])->name('activityhistorie.show');
Route::post('activityhistorie/store', [ActivityHistorieController::class, 'store'])->name('activityhistorie.store');
Route::get('activityhistorie/{activity}/edit', [ActivityHistorieController::class, 'edit'])->name('activityhistorie.edit');
Route::put('activityhistorie/{activity}', [ActivityHistorieController::class, 'update'])->name('activityhistorie.update');
Route::delete('activityhistorie/{activity}', [ActivityHistorieController::class, 'destroy'])->name('activityhistorie.destroy');

use App\Http\Controllers\ProcedureController;
Route::get('procedure/list', [ProcedureController::class, 'index'])->name('procedure.index');
Route::get('procedure/create', [ProcedureController::class, 'create'])->name('procedure.create');
Route::get('procedure/{procedure}', [ProcedureController::class, 'show'])->name('procedure.show');
Route::post('procedure/store', [ProcedureController::class, 'store'])->name('procedure.store');
Route::get('procedure/{procedure}/edit', [ProcedureController::class, 'edit'])->name('procedure.edit');
Route::put('procedure/{procedure}', [ProcedureController::class, 'update'])->name('procedure.update');
Route::delete('procedure/{procedure}', [ProcedureController::class, 'destroy'])->name('procedure.destroy');

use App\Http\Controllers\MedicationTreatmentController;
Route::get('medicationtreatment/list', [MedicationTreatmentController::class, 'index'])->name('medicationtreatment.index');
Route::get('medicationtreatment/create', [MedicationTreatmentController::class, 'create'])->name('medicationtreatment.create');
Route::get('medicationtreatment/{medication_treatment}', [MedicationTreatmentController::class, 'show'])->name('medicationtreatment.show');
Route::post('medicationtreatment/store', [MedicationTreatmentController::class, 'store'])->name('medicationtreatment.store');
Route::get('medicationtreatment/{medication_treatment}/edit', [MedicationTreatmentController::class, 'edit'])->name('medicationtreatment.edit');
Route::put('medicationtreatment/{medication_treatment}', [MedicationTreatmentController::class, 'update'])->name('medicationtreatment.update');
Route::delete('medicationtreatment/{medication_treatment}', [MedicationTreatmentController::class, 'destroy'])->name('medicationtreatment.destroy');

use App\Http\Controllers\WarningController;
Route::get('warning/list', [WarningController::class, 'index'])->name('warning.index');
Route::get('warning/create', [WarningController::class, 'create'])->name('warning.create');
Route::get('warning/{warning}', [WarningController::class, 'show'])->name('warning.show');
Route::post('warning/store', [WarningController::class, 'store'])->name('warning.store');
Route::get('warning/{warning}/edit', [WarningController::class, 'edit'])->name('warning.edit');
Route::put('warning/{warning}', [WarningController::class, 'update'])->name('warning.update');
Route::delete('warning/{warning}', [WarningController::class, 'destroy'])->name('warning.destroy');

use App\Http\Controllers\RecommendationController;
Route::get('recommendation/list', [RecommendationController::class, 'index'])->name('recommendation.index');
Route::get('recommendation/create', [RecommendationController::class, 'create'])->name('recommendation.create');
Route::get('recommendation/{recommendation}', [RecommendationController::class, 'show'])->name('recommendation.show');
Route::post('recommendation/store', [RecommendationController::class, 'store'])->name('recommendation.store');
Route::get('recommendation/{recommendation}/edit', [RecommendationController::class, 'edit'])->name('recommendation.edit');
Route::put('recommendation/{recommendation}', [RecommendationController::class, 'update'])->name('recommendation.update');
Route::delete('recommendation/{recommendation}', [RecommendationController::class, 'destroy'])->name('recommendation.destroy');

use App\Http\Controllers\CareRecordController;
Route::get('carerecord/list', [CareRecordController::class, 'index'])->name('carerecord.index');
Route::get('carerecord/create', [CareRecordController::class, 'create'])->name('carerecord.create');
Route::get('carerecord/{care_record}', [CareRecordController::class, 'show'])->name('carerecord.show');
Route::post('carerecord/store', [CareRecordController::class, 'store'])->name('carerecord.store');
Route::get('carerecord/{care_record}/edit', [CareRecordController::class, 'edit'])->name('carerecord.edit');
Route::put('carerecord/{care_record}', [CareRecordController::class, 'update'])->name('carerecord.update');
Route::delete('carerecord/{care_record}', [CareRecordController::class, 'destroy'])->name('carerecord.destroy');

use App\Http\Controllers\PlantCareController;
Route::get('plantcare/list', [PlantCareController::class, 'index'])->name('plantcare.index');
Route::get('plantcare/create', [PlantCareController::class, 'create'])->name('plantcare.create');
Route::get('plantcare/{plant_care}', [PlantCareController::class, 'show'])->name('plantcare.show');
Route::post('plantcare/store', [PlantCareController::class, 'store'])->name('plantcare.store');
Route::get('plantcare/{plant_care}/edit', [PlantCareController::class, 'edit'])->name('plantcare.edit');
Route::put('plantcare/{plant_care}', [PlantCareController::class, 'update'])->name('plantcare.update');
Route::delete('plantcare/{plant_care}', [PlantCareController::class, 'destroy'])->name('plantcare.destroy');

use App\Http\Controllers\PestPlantController;
Route::get('pestplant/list', [PestPlantController::class, 'index'])->name('pestplant.index');
Route::get('pestplant/create', [PestPlantController::class, 'create'])->name('pestplant.create');
Route::get('pestplant/{pest_plant}', [PestPlantController::class, 'show'])->name('pestplant.show');
Route::post('pestplant/store', [PestPlantController::class, 'store'])->name('pestplant.store');
Route::get('pestplant/{pest_plant}/edit', [PestPlantController::class, 'edit'])->name('pestplant.edit');
Route::put('pestplant/{pest_plant}', [PestPlantController::class, 'update'])->name('pestplant.update');
Route::delete('pestplant/{pest_plant}', [PestPlantController::class, 'destroy'])->name('pestplant.destroy');

use App\Http\Controllers\PlagueSymptomController;
Route::get('plaguesymptom/list', [PlagueSymptomController::class, 'index'])->name('plaguesymptom.index');
Route::get('plaguesymptom/create', [PlagueSymptomController::class, 'create'])->name('plaguesymptom.create');
Route::get('plaguesymptom/{plague_symptom}', [PlagueSymptomController::class, 'show'])->name('plaguesymptom.show');
Route::post('plaguesymptom/store', [PlagueSymptomController::class, 'store'])->name('plaguesymptom.store');
Route::get('plaguesymptom/{plague_symptom}/edit', [PlagueSymptomController::class, 'edit'])->name('plaguesymptom.edit');
Route::put('plaguesymptom/{plague_symptom}', [PlagueSymptomController::class, 'update'])->name('plaguesymptom.update');
Route::delete('plaguesymptom/{plague_symptom}', [PlagueSymptomController::class, 'destroy'])->name('plaguesymptom.destroy');

use App\Http\Controllers\UserController;
Route::get('user/list', [UserController::class, 'index'])->name('user.index');
Route::get('user/create', [UserController::class, 'create'])->name('user.create');
Route::get('user/{user}', [UserController::class, 'show'])->name('user.show');
Route::post('user/store', [UserController::class, 'store'])->name('user.store');
Route::get('user/{user}/edit', [UserController::class, 'edit'])->name('user.edit');
Route::put('user/{user}', [UserController::class, 'update'])->name('user.update');
Route::delete('user/{user}', [UserController::class, 'destroy'])->name('user.destroy');

use App\Http\Controllers\GardenController;
Route::get('garden/list', [GardenController::class, 'index'])->name('garden.index');
Route::get('garden/create', [GardenController::class, 'create'])->name('garden.create');
Route::get('garden/{garden}', [GardenController::class, 'show'])->name('garden.show');
Route::post('garden/store', [GardenController::class, 'store'])->name('garden.store');
Route::get('garden/{garden}/edit', [GardenController::class, 'edit'])->name('garden.edit');
Route::put('garden/{garden}', [GardenController::class, 'update'])->name('garden.update');
Route::delete('garden/{garden}', [GardenController::class, 'destroy'])->name('garden.destroy');

use App\Http\Controllers\ImagePlantController;
Route::get('imageplant/list', [ImagePlantController::class, 'index'])->name('imageplant.index');
Route::get('imageplant/create', [ImagePlantController::class, 'create'])->name('imageplant.create');
Route::get('imageplant/{imageplant}', [ImagePlantController::class, 'show'])->name('imageplant.show');
Route::post('imageplant/store', [ImagePlantController::class, 'store'])->name('imageplant.store');
Route::get('imageplant/{imageplant}/edit', [ImagePlantController::class, 'edit'])->name('imageplant.edit');
Route::put('imageplant/{imageplant}', [ImagePlantController::class, 'update'])->name('imageplant.update');
Route::delete('imageplant/{imageplant}', [ImagePlantController::class, 'destroy'])->name('imageplant.destroy');

use App\Http\Controllers\ImagePlagueController;
Route::get('imageplague/list', [ImagePlagueController::class, 'index'])->name('imageplague.index');
Route::get('imageplague/create', [ImagePlagueController::class, 'create'])->name('imageplague.create');
Route::get('imageplague/{imageplague}', [ImagePlagueController::class, 'show'])->name('imageplague.show');
Route::post('imageplague/store', [ImagePlagueController::class, 'store'])->name('imageplague.store');
Route::get('imageplague/{imageplague}/edit', [ImagePlagueController::class, 'edit'])->name('imageplague.edit');
Route::put('imageplague/{imageplague}', [ImagePlagueController::class, 'update'])->name('imageplague.update');
Route::delete('imageplague/{imageplague}', [ImagePlagueController::class, 'destroy'])->name('imageplague.destroy');


use App\Http\Controllers\SymptomController;
Route::get('symptom/list', [SymptomController::class, 'index'])->name('symptom.index');
Route::get('symptom/create', [SymptomController::class, 'create'])->name('symptom.create');
Route::get('symptom/{symptom}', [SymptomController::class, 'show'])->name('symptom.show');
Route::post('symptom/store', [SymptomController::class, 'store'])->name('symptom.store');
Route::get('symptom/{symptom}/edit', [SymptomController::class, 'edit'])->name('symptom.edit');
Route::put('symptom/{symptom}', [SymptomController::class, 'update'])->name('symptom.update');
Route::delete('symptom/{symptom}', [SymptomController::class, 'destroy'])->name('symptom.destroy');


use App\Http\Controllers\MedicineController;
Route::get('medicine/list', [MedicineController::class, 'index'])->name('medicine.index');
Route::get('medicine/create', [MedicineController::class, 'create'])->name('medicine.create');
Route::get('medicine/{medicine}', [MedicineController::class, 'show'])->name('medicine.show');
Route::post('medicine/store', [MedicineController::class, 'store'])->name('medicine.store');
Route::get('medicine/{medicine}/edit', [MedicineController::class, 'edit'])->name('medicine.edit');
Route::put('medicine/{medicine}', [MedicineController::class, 'update'])->name('medicine.update');
Route::delete('medicine/{medicine}', [MedicineController::class, 'destroy'])->name('medicine.destroy');

use App\Http\Controllers\TreatmentController;
Route::get('treatment/list', [TreatmentController::class, 'index'])->name('treatment.index');
Route::get('treatment/create', [TreatmentController::class, 'create'])->name('treatment.create');
Route::get('treatment/{treatment}', [TreatmentController::class, 'show'])->name('treatment.show');
Route::post('treatment/store', [TreatmentController::class, 'store'])->name('treatment.store');
Route::get('treatment/{treatment}/edit', [TreatmentController::class, 'edit'])->name('treatment.edit');
Route::put('treatment/{treatment}', [TreatmentController::class, 'update'])->name('treatment.update');
Route::delete('treatment/{treatment}', [TreatmentController::class, 'destroy'])->name('treatment.destroy');

use App\Http\Controllers\PlantController;
Route::get('plant/list', [PlantController::class, 'index'])->name('plant.index');
Route::get('plant/create', [PlantController::class, 'create'])->name('plant.create');
Route::get('plant/{plant}', [PlantController::class, 'show'])->name('plant.show');
Route::post('plant/store', [PlantController::class, 'store'])->name('plant.store');
Route::get('plant/{plant}/edit', [PlantController::class, 'edit'])->name('plant.edit');
Route::put('plant/{plant}', [PlantController::class, 'update'])->name('plant.update');
Route::delete('plant/{plant}', [PlantController::class, 'destroy'])->name('plant.destroy');

use App\Http\Controllers\PlagueController;
Route::get('plague/list', [PlagueController::class, 'index'])->name('plague.index');
Route::get('plague/create', [PlagueController::class, 'create'])->name('plague.create');
Route::get('plague/{plague}', [PlagueController::class, 'show'])->name('plague.show');
Route::post('plague/store', [PlagueController::class, 'store'])->name('plague.store');
Route::get('plague/{plague}/edit', [PlagueController::class, 'edit'])->name('plague.edit');
Route::put('plague/{plague}', [PlagueController::class, 'update'])->name('plague.update');
Route::delete('plague/{plague}', [PlagueController::class, 'destroy'])->name('plague.destroy');
Route::get('/', function () {
    return view('welcome');
});

