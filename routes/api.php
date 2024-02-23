<?php

use App\Http\Controllers\AsistenciasController;
use App\Http\Controllers\DocentesController;
use App\Http\Controllers\EstudiantesController;
use App\Http\Controllers\MateriasController;
use App\Http\Controllers\MatriculasController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::apiResource('/docentes', DocentesController::class);
Route::post('/docentes', [DocentesController::class, 'store']);
Route::get('/docentes/{id}', [DocentesController::class,'show']);
Route::put('/docentes/{id}', [DocentesController::class, 'update']);
Route::delete('/docentes/{id}', [DocentesController::class, 'destroy']);

Route::apiResource('/estudiantes', EstudiantesController::class);
Route::post('/estudiantes', [EstudiantesController::class, 'store']);
Route::get('/estudiantes/{id}', [EstudiantesController::class,'show']);
Route::put('/estudiantes/{id}', [EstudiantesController::class, 'update']);
Route::delete('/estudiantes/{id}', [EstudiantesController::class, 'destroy']);


Route::apiResource('/materias', MateriasController::class);
Route::post('/materias', [MateriasController::class, 'store']);
Route::get('/materias/{id}', [MateriasController::class,'show']);
Route::put('/materias/{id}', [MateriasController::class, 'update']);
Route::delete('/materias/{id}', [MateriasController::class, 'destroy']);


Route::apiResource('/matriculas', MatriculasController::class);
Route::get('/matriculas/{id}', [MatriculasController::class, 'show']);
Route::post('/matriculas', [MatriculasController::class, 'store']);
Route::put('/matriculas/{id}', [MatriculasController::class, 'update']);
Route::delete('/matriculas/{id}', [MatriculasController::class, 'destroy']);



Route::apiResource('/asistencias', AsistenciasController::class);
Route::get('/asistencias/{id}', [AsistenciasController::class, 'show']);
Route::post('/asistencias', [AsistenciasController::class, 'store']);
Route::put('/asistencias/{id}', [AsistenciasController::class, 'update']);
Route::delete('/asistencias/{id}', [AsistenciasController::class, 'destroy']);