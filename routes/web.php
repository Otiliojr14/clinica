<?php

use App\Http\Controllers\clPersonalController;
use App\Http\Controllers\MedicalHistoryController;
use App\Models\ClPersonal;
use App\Models\Specialty;
use App\Models\UnvPersonal;
use Illuminate\Support\Facades\Route;

Route::get('/', [clPersonalController::class, 'login']);
// Route::resource('clpersonal', clPersonalController::class);

Route::resource('medical_history', MedicalHistoryController::class);

Route::get('/insert', function () {
    // $unv_personal = new UnvPersonal();
    // $unv_personal->nombre = 'Ramón';
    // $unv_personal->apellido = 'Cuj Escamilla';
    // $unv_personal->telefono = '9341354212';
    // $unv_personal->matricula = '932850';
    // $unv_personal->no_beneficiario = 0;
    // $unv_personal->parentesco = 'Derecho';
    // $unv_personal->sexo = 'H';
    // $unv_personal->fecha_nacimiento = '1976-05-10';
    // $unv_personal->save();

    // $cl_personal = new ClPersonal();
    // $cl_personal->unv_personal_id = 3;
    // $cl_personal->categoria = 1;
    // $cl_personal->save();

    $specialty = new Specialty();
    $specialty->name = 'CARDIOLOGIA';
    $specialty->save();
});

Route::post('/clpersonal/ajax', [clPersonalController::class , 'ajax']);
Route::get('/clpersonal/close_section', [clPersonalController::class , 'close_section']);