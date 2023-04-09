<?php

use App\Http\Controllers\backend\auth\AuthenticationController;
use App\Http\Controllers\backend\BloodBankController;
use App\Http\Controllers\backend\BloodStockController;
use App\Http\Controllers\backend\DonarController;
use App\Http\Controllers\backend\HomeController;
use App\Http\Controllers\backend\PatientController;
use App\Http\Controllers\backend\SendRequestController;
use App\Http\Controllers\frontend\AuthController;
use App\Http\Controllers\frontend\BloodBankController as FrontendBloodBankController;
use App\Http\Controllers\frontend\DonarController as FrontendDonarController;
use App\Http\Controllers\frontend\HomeController as FrontendHomeController;
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

//  Frontend routes

Route::get('/', [FrontendHomeController::class, 'home'])->name('home');

// login && registration
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::get('/registration', [AuthController::class, 'registration'])->name('registration');




Route::post('/submit-registration', [AuthController::class, 'submitRegistration'])->name('submitRegistration');
Route::post('/submit-login', [AuthController::class, 'submitLogin'])->name('submitLogin');

Route::group(['prefix' => 'patient', 'middleware' => 'auth'], function () {
    Route::get('/logout', [AuthController::class, 'logout'])->name('patient.logout');
    Route::get('/profile-edit', [AuthController::class, 'profileEdit'])->name('edit');
    Route::put('/profile-update', [AuthController::class, 'profileUpdate'])->name('profileUpdate');
    Route::get('/password-change',[AuthController::class,'changePassword'])->name('changePasswordPatient');
    Route::put('/password-update',[AuthController::class,'updatePassword'])->name('updatePasswordPatient');

    // Donar
    Route::get('/donar-list', [FrontendDonarController::class, 'donarList'])->name('donarList');
    // Send Request
    Route::get('/send-request/donar_id={donar_id}/patient_id={patient_id}/user_id={user_id}',
        [FrontendDonarController::class, 'sendRequestToDonar'])->name('patient.send.request');
    // Delete Request
    Route::get('/cancel-sent-request/donar_id={donar_id}/patient_id={patient_id}/user_id={user_id}',
        [FrontendDonarController::class, 'deleteRequest'])->name('patient.delete.request');

    Route::get('/blood-bank', [FrontendBloodBankController::class, 'bloodBankList'])->name('bloodBankList');
    // Messege to admin
    Route::get('/message-to-admin/{id}', [FrontendBloodBankController::class, 'message'])->name('messageToAdmin');
    Route::post('/send-message', [FrontendBloodBankController::class, 'sendMessage'])->name('sendMessage');

});

//  Backend Routes
Route::group(['prefix' => 'app'], function () {

    Route::get('/login-page', [AuthenticationController::class, 'loginPage'])->name('login.page');
    Route::post('/login-submit', [AuthenticationController::class, 'submitLogin'])->name('login.submit');
    Route::get('/logout', [AuthenticationController::class, 'logout'])->name('logout');

    Route::group(['prefix' => 'donar'], function () {

        Route::get('/register', [DonarController::class, 'register'])->name('donar.register');
        Route::post('/registration-submit', [DonarController::class, 'submitRegistration'])->name('donar.registration.submit');
        Route::get('/login', [DonarController::class, 'donarLogin'])->name('donar.login');
        Route::get('/logout', [DonarController::class, 'donarlogout'])->name('donar.logout');

        Route::post('/login-submit', [DonarController::class, 'submitLogin'])->name('donar.submit.login');

        Route::group(['middleware' => 'donar'], function () {
            // home pages

            Route::get('/donar-edit', [DonarController::class, 'editDonar'])->name('edit.donar');
            Route::put('/donar-update', [DonarController::class, 'updateDonar'])->name('update.donar');
            Route::get('/password-change',[DonarController::class,'changePassword'])->name('changePassword');
            Route::put('/password-update',[DonarController::class,'updatePassword'])->name('updatePassword');


            Route::get('/', [HomeController::class, 'dashboard'])->name('donar.dashboard');
            Route::get('/donate-blood-to-bank', [BloodBankController::class, 'donateNow'])->name('donate.bloodToBank');
            Route::get('/donate-blood-to-patient', [BloodBankController::class, 'patientDonate'])->name('donate.ToPatient');
            Route::post('/save-donate-blood-to-bank', [BloodBankController::class, 'donateSaveifo'])->name('donate.bloodToBank.save');
            Route::post('/save-donate-blood-to-patient', [BloodBankController::class, 'donateToPatientinfo'])->name('donate.bloodToPatient.save');
            Route::get('/requested-list', [SendRequestController::class, 'requestedList'])->name('requestedList');
            Route::get('/confirm-request/user={user_id}', [SendRequestController::class, 'confirmRequest'])->name('confirm.request');
            Route::get('/delete-request/user={user_id}', [SendRequestController::class, 'deletePatientRequest'])->name('donar.delete.request');

        });

    });

    Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function () {

        // home pages
        Route::get('/', [HomeController::class, 'dashboard'])->name('dashboard');

        // Patient routes
        Route::get('/allPatients', [PatientController::class, 'allPatients'])->name('allPatients');
        Route::get('/patient', [PatientController::class, 'createpatient'])->name('create.patient');
        Route::post('/patient-save', [PatientController::class, 'savePatient'])->name('patient.save');
        Route::get('/patient-edit/{id}', [PatientController::class, 'edit'])->name('patient.edit');
        Route::put('/patient-update/{id}', [PatientController::class, 'updatePatient'])->name('patient.update');
        Route::get('/patient-delete/{id}', [PatientController::class, 'deletePatient'])->name('patient.delete');

        // Donars Routes
        Route::get('/donar-form', [DonarController::class, 'donarForm'])->name('donar.form');
        Route::get('/all-donars', [DonarController::class, 'allDonars'])->name('all.donar');
        Route::post('/create-donar', [DonarController::class, 'createDonar'])->name('create.donar');
        Route::get('/donar-delete/{id}', [DonarController::class, 'deleteDonar'])->name('delete.donar');
        Route::get('/donar-status/{id}/{status}', [DonarController::class, 'status'])->name('donar.status');

        // Donar Stock list

        Route::get('/blood-stock-list', [BloodStockController::class, 'stockList'])->name('blood.stock.list');
        Route::get('/donar-profile/{id}', [BloodStockController::class, 'donarProfile'])->name('donar.profile');

        // Send Request
        Route::get('/send-request/donar={donar_id}/user={user_id}', [SendRequestController::class, 'sendRequest'])->name('send.request');
        Route::get('/delete-request/donar={donar_id}/user={user_id}', [SendRequestController::class, 'deleteRequest'])->name('delete.request');

        // Bank
        Route::get('/blood-bank', [BloodBankController::class, 'bloodList'])->name('blood.list');
        Route::get('/delete-bank-blood/{id}', [BloodBankController::class, 'deleteBankBlood'])->name('deleteBankBlood');

        // message response
        Route::get('/message-lists', [BloodBankController::class, 'messageLists'])->name('messageLists');
        Route::get('/see-message/bloodBankReq_id={id}/bloodBank_id={blood_bank_id}/patient_id={patient_id}', [BloodBankController::class, 'seeMessage'])->name('seeMessage');
        Route::post('/reply-message/bloodBankReq_id={id}/bloodBank_id={blood_bank_id}/patient_id={patient_id}', [BloodBankController::class, 'replyMessage'])->name('replyMessage');
        Route::get('/remove-message/bloodBankReq_id={id}/bloodBank_id={blood_bank_id}/patient_id={patient_id}', [BloodBankController::class, 'removeMessage'])->name('removeMessage');

    });

});
