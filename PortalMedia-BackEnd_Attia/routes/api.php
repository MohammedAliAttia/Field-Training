<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AccountController; 
use App\Http\Controllers\DepartmentController; 

use App\Http\Controllers\ProjectUploadController;

use App\Http\Controllers\ProjectController;
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get('/accounts', [AccountController::class, 'index']);
Route::post('/accounts', [AccountController::class, 'store']);
Route::get('/accounts/{id}', [AccountController::class, 'show']);
Route::put('/accounts/{id}', [AccountController::class, 'update']);
Route::delete('/accounts/{id}', [AccountController::class, 'destroy']);
Route::post('/register', [AccountController::class, 'register']);
Route::post('/login', [AccountController::class, 'login']);


Route::get('/departments', [DepartmentController::class, 'index']);
Route::post('/departments', [DepartmentController::class, 'store']);
Route::get('/departments/{id}', [DepartmentController::class, 'show']);
Route::put('/departments/{id}', [DepartmentController::class, 'update']);
Route::delete('/departments/{id}', [DepartmentController::class, 'destroy']);



Route::get('/projects', [ProjectController::class, 'index']);
Route::post('/projects', [ProjectController::class, 'store']);
Route::post('/projects/store2', [ProjectController::class, 'store2']);
Route::get('/projects/{id}', [ProjectController::class, 'show']);
Route::put('/projects/{id}', [ProjectController::class, 'update']);
Route::delete('/projects/{id}', [ProjectController::class, 'destroy']);
 
Route::get('/departments/{departmentId}/projects', [ProjectController::class, 'getProjectsByDepartmentId']);
Route::get('/departments/{departmentId}/getProjectsByDepartmentIdWithVideo', [ProjectController::class, 'getProjectsByDepartmentIdWithVideo']);






use App\Http\Controllers\ProjectReviewController;

// Routes for Project Reviews
Route::post('/project-reviews', [ProjectReviewController::class, 'store']);
Route::get('/projects/{projectId}/project-reviews', [ProjectReviewController::class, 'getReviewsByProjectId']);



use App\Http\Controllers\ScreenshotController;

Route::get('/screenshots', [ScreenshotController::class, 'index']);
Route::get('/screenshots/{id}', [ScreenshotController::class, 'show']);
Route::post('/screenshots', [ScreenshotController::class, 'store']);
Route::put('/screenshots/{id}', [ScreenshotController::class, 'update']);
Route::delete('/screenshots/{id}', [ScreenshotController::class, 'destroy']);



Route::get('/projects/{projectId}/screenshots', [ScreenshotController::class, 'getScreenshotsByProjectId']);


Route::post('/screenshots/upload', [ScreenshotController::class, 'upload']);


Route::get('/screenshots/project/{projectId}', [ScreenshotController::class, 'getUploadedScreenShotsByProjectID']);



Route::post('/project-uploads', [ProjectUploadController::class, 'store']);
Route::get('/project-uploads/{id}/download', [ProjectUploadController::class, 'download']);
