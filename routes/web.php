<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ResumeController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\Backend\BackendHome;
use App\Http\Controllers\Backend\BackendResume;
use App\Http\Controllers\Backend\UserController;
use App\Http\Middleware\TokenVarificationMiddleware;
use App\Http\Controllers\Backend\dashboardController;

// use App\Http\Controllers\Backend\CustomerController as BackendCustomerController;

// Page Routes
Route::get('/', [HomeController::class, 'page']);
Route::get('/contact', [ContactController::class, 'page']);
Route::get('/projects', [ProjectController::class, 'page']);
Route::get('/resume', [ResumeController::class, 'page']);

// Ajax Call Routes
Route::get('/heroData', [HomeController::class, 'heroData']);
Route::get('/aboutData', [HomeController::class, 'aboutData']);
Route::get('/socialData', [HomeController::class, 'socialData']);
Route::get('/projectsData', [ProjectController::class, 'projectsData']);
Route::get('/resumeLink', [ResumeController::class, 'resumeLink']);
Route::get('/experiencesData', [ResumeController::class, 'experiencesData']);
Route::get('/educationData', [ResumeController::class, 'educationData']);
Route::get('/skillsData', [ResumeController::class, 'skillsData']);
Route::get('/languageData', [ResumeController::class, 'languageData']);
Route::post('/contactRequest', [ContactController::class, 'contactRequest']);

// ====================== backaend start ========================

// Auth backend route
Route::controller(UserController::class)->group(function () {
    Route::post('/user_registration', 'UserRegistration');
    Route::post('/user_login', 'login');
    Route::post('/user_send_otp', 'sendOTP');
    Route::post('/user_verify_otp', 'verifyOTP');
    Route::post('/user_reset_password', 'resetPassword')->middleware([TokenVarificationMiddleware::class]);
    Route::get('/get_profile', 'getProfile')->middleware([TokenVarificationMiddleware::class]);
    Route::post('/update_profile', 'updateProfile')->middleware([TokenVarificationMiddleware::class]);

    // Auth frontend page route
    Route::get('/login', 'LoginPage')->name('login');
    Route::get('/registration', 'RegistrationPage')->name('registration');
    Route::get('/send-otp', 'SendOtpPage')->name('send-otp');
    Route::get('/verify-otp', 'VerifyOTPPage')->name('verify-otp')->middleware([TokenVarificationMiddleware::class]);
    Route::get('/reset-password', 'ResetPasswordPage')->name('reset-password')->middleware([TokenVarificationMiddleware::class]);
    Route::get('/logout', 'logout')->name('logout');
});

// group middleware
Route::group(['middleware' => [TokenVarificationMiddleware::class]], function () {

// Dashboard Controller
    Route::controller(dashboardController::class)->group(function () {
        Route::get('/dashboard', 'dashboardPage')->name('dashboard');
        Route::get('/profile', 'profilePage')->name('profile');
    });

// dashboard home
    Route::controller(BackendHome::class)->group(function () {
        // ------ hero
        Route::get('/hero', 'heroPage')->name('hero.page');
        Route::get('/hero-data', 'herodata')->name('herodata');
        Route::post('/update-hero', 'updateHero')->name('updateHero');

        // -------about
        Route::get('/about', 'aboutPage')->name('about.page');
        Route::get('/about-data', 'aboutData');
        Route::post('/update-about', 'updateAbout');

        // -------social
        Route::get('/social', 'socialPage')->name('social.page');
        Route::get('/social-data', 'socialData');
        Route::post('/update-social', 'updateSocial');
    });

    // resume
    Route::controller(BackendResume::class)->group(function () {
    // ------ Experience
        Route::get('/list-experience', 'listExperiencePage')->name('listExperiencePage');
        Route::get('/experience-data', 'ExperienceData');

        Route::post('/create-experience', 'createExperience');
        Route::post("/customer-by-id",'experienceById');

        Route::post("/update-experience",'updateExperience');
        Route::post("/delete-experience",'deleteExperience');





    });
});
