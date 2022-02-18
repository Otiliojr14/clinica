<?php

use App\Http\Controllers\AjaxController;
use App\Http\Controllers\clPersonalController;
use App\Http\Controllers\MedicalHistoryController;
use App\Models\ClPersonal;
use App\Models\UnvPersonal;
use Illuminate\Support\Facades\Route;

Route::get('/', [clPersonalController::class, 'login']);
// Route::resource('clpersonal', clPersonalController::class);

Route::resource('medical_history', MedicalHistoryController::class);

Route::get('/read', function () {
    // $personal = UnvPersonal::findOrFail(1);

    // return $personal->category;

    $personal = ClPersonal::findOrFail(1);

    return $personal->unv_personal;

    // echo $user->address->name;

    // $user->address()->delete();
});

// Route::post('/ajax', [clPersonalController::class , 'save']);

Route::post('/clpersonal/login', [clPersonalController::class , 'check_user']);