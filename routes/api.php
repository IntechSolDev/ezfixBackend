<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\NotificationController;
use App\Http\Controllers\Api\WordlyController;
use App\Http\Controllers\Api\DonateController;

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

//User Auth Api Route
Route::post('login', [UserController::class, 'login']);
Route::post('register', [UserController::class, 'register']);
Route::post('forgot', [UserController::class, 'forgot']);
Route::post('confirm-code', [UserController::class, 'confirmCode']);
Route::post('reset', [UserController::class, 'reset']);
Route::post('change-password', [UserController::class, 'changePassword']); //Bear Token Needed
Route::post('edit', [UserController::class, 'edit']);
Route::post('verify', [UserController::class, 'verifyEmail']);
Route::get('details', [UserController::class, 'details']); //Bear Token Needed
Route::get('delete-user', [UserController::class, 'delete']); //Delete All user
Route::post('update-fcm', [UserController::class, 'updateFcmToken']);


Route::group(['middleware' =>'auth:api'], function () {

    //User
    Route::post('delete-user', [UserController::class, 'deleteUser']); //User deleted

    // Start Notification Routes
    
    // Show All Notification
    Route::get('viewAllNotification', [NotificationController::class, 'viewAllNotification']);
    
    // Change Notification Status
    Route::get('changeStatusNotification', [NotificationController::class, 'changeStatusNotification']);
    
    // Delete Notification
    Route::post('deleteNotification', [NotificationController::class, 'deleteNotification']);
    
    // End Notification Routes
    
    // Start Wordly Routes
    
    // Add Community
    Route::post('add_community', [WordlyController::class, 'add_community']);
    
    // See My Community
    Route::get('my_community', [WordlyController::class, 'my_community']);
    
    // See All Community
    Route::get('all_community', [WordlyController::class, 'all_community']);
    
    // Donate Community
    Route::post('donate', [DonateController::class, 'donate']);

    // End Wordly Routes

});
