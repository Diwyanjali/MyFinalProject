<?php

use App\Http\Controllers\Admin\BookingController;
use App\Http\Controllers\Admin\DoctorController;
use App\Http\Controllers\Admin\DoctorSpecializationController;
use App\Http\Controllers\Admin\DrugController;
use App\Http\Controllers\Admin\FeedbackController;
use App\Http\Controllers\Admin\TreatmentController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DoctorProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Web\HotelController;
use App\Http\Controllers\Web\MedicalCenterController;
use App\Http\Controllers\Web\WebController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
 */

require __DIR__ . '/auth.php';

Route::controller(WebController::class)->group(function() {
    Route::get('/', 'welcome')->name('welcome');
    Route::get('/about', 'about')->name('about');
    Route::get('/contact', 'contact')->name('contact');
    Route::get('/feedbacks', 'feedbacks')->name('feedbacks');
});

//doctor routes
Route::prefix('doctor')->middleware(['auth', 'role:doctor'])->group(function () {
    Route::controller(DoctorProfileController::class)->group(function () {
        Route::get('/dashboard', 'dashboard')->name('doctor.dashboard');
        Route::get('/appoinments/{id}', 'appoinmentView')->name('doctor.appoinment.view');
        Route::post('/add_prescription', 'addPrescription')->name('doctor.appoinment.add_prescription');
    });
});

//user routes
Route::prefix('user')->middleware(['auth', 'role:user'])->group(function () {
    Route::controller(UserController::class)->group(function () {
        Route::get('/dashboard', 'dashboard')->name('user.dashboard');
        Route::post('/dashboard', 'updateProfile')->name('user.updateProfile');
        Route::get('/feedback', 'reviews')->name('user.reviews');
        Route::post('/feedback', 'postReview')->name('user.reviews.post');
        Route::delete('/feedback/{id}', 'removeReview')->name('user.reviews.remove');

        Route::prefix('bookings')->group(function() {
            Route::get('/hotel', 'hotel_bookings')->name('user.bookings.hotel');
            Route::delete('/hotel/{id}', 'cancel_hotel_booking')->name('user.bookings.hotel.cancel');
            
            Route::get('/medical', 'medical_bookings')->name('user.bookings.medical');
            Route::get('/medical/{id}', 'view_medical_booking')->name('user.bookings.medical.view');
            Route::delete('/medical/{id}', 'cancel_medical_booking')->name('user.bookings.medical.cancel');
        });
    });
});

//web routes
Route::prefix('hotel')->controller(HotelController::class)->group(function () {
    Route::get('/', 'index')->name('web.hotel.index');
    Route::get('/{slug}', 'show')->name('web.hotel.show')->middleware(['auth', 'role:user']);
    Route::post('/store', 'store')->name('web.hotel.store')->middleware(['auth', 'role:user']);
});

Route::prefix('medical-center')->controller(MedicalCenterController::class)->group(function () {
    Route::get('/', 'index')->name('web.medical_center.index');
    Route::get('/channel/{doctorCode}', 'channel')->name('web.medical_center.channel')->middleware(['auth', 'role:user']);
    Route::post('/appointment', 'makeAppointment')->name('web.medical_center.makeAppointment')->middleware(['auth', 'role:user']);
});

//admin routes
Route::prefix('admin')->middleware(['auth', 'role:admin'])->group(function () {

    Route::controller(AdminController::class)->group(function () {
        Route::get('/dashboard', 'AdminDashboard')->name('admin.dashboard');
    });

    Route::prefix('doctors')->group(function () {

        Route::controller(DoctorController::class)->group(function () {
            Route::get('/all', 'index')->name('admin.doctors.index');
            Route::get('/create', 'create')->name('admin.doctors.create');
            Route::post('/store', 'store')->name('admin.doctors.store');
            Route::get('/edit/{id}', 'show')->name('admin.doctors.show');
            Route::put('/update/{id}', 'update')->name('admin.doctors.update');
            Route::get('delete/{id}', 'delete')->name('admin.doctors.delete');
        });

        Route::prefix('time-slots')->controller(BookingController::class)->group(function () {
            Route::get('/all', 'timeSlots')->name('admin.time_slots.index');
            Route::get('/doctor', 'doctorTimeSlots')->name('admin.time_slots.doctor');
            Route::get('/assign', 'createDoctorTimeslot')->name('admin.time_slots.doctor.assign');
            Route::post('/assign', 'assingDoctorTimeSlots')->name('admin.time_slots.assign');
            Route::get('/doctor/{id}', 'showDoctorTimeSlot')->name('admin.time_slot.doctor.view');
            Route::put('/doctor/{id}', 'updateDoctorTimeSlot')->name('admin.time_slot.doctor.update');
            Route::get('/doctor/delete/{id}', 'deleteDoctorTimeSlot')->name('admin.time_slot.doctor.delete');
        });

        Route::prefix('specializations')->controller(DoctorSpecializationController::class)->group(function () {
            Route::get('/all', 'index')->name('admin.doctors.specializations.index');
            Route::get('/create', 'create')->name('admin.doctors.specializations.create');
            Route::post('/store', 'store')->name('admin.doctors.specializations.store');
            Route::get('/edit/{id}', 'show')->name('admin.doctors.specializations.show');
            Route::put('/update/{id}', 'update')->name('admin.doctors.specializations.update');
            Route::get('/delete/{id}', 'delete')->name('admin.doctors.specializations.delete');
        });

        Route::prefix('bookings')->controller(BookingController::class)->group(function () {
            Route::get('/hotel', 'hotelBookings')->name('admin.bookings.hotel');
            Route::get('/doctor', 'doctorCookings')->name('admin.bookings.doctor');
        });
    });

    Route::prefix('treatments')->controller(TreatmentController::class)->group(function () {
        Route::get('/all', 'index')->name('admin.treatments.index');
        Route::get('/create', 'create')->name('admin.treatments.create');
        Route::post('/store', 'store')->name('admin.treatments.store');
        Route::get('/edit/{id}', 'show')->name('admin.treatments.show');
        Route::put('/update/{id}', 'update')->name('admin.treatments.update');
        Route::get('/delete/{id}', 'delete')->name('admin.treatments.delete');
    });

    Route::prefix('drugs')->controller(DrugController::class)->group(function () {
        Route::get('/all', 'index')->name('admin.drugs.index');
        Route::get('/create', 'create')->name('admin.drugs.create');
        Route::post('/store', 'store')->name('admin.drugs.store');
        Route::get('/edit/{id}', 'show')->name('admin.drugs.show');
        Route::put('/update/{id}', 'update')->name('admin.drugs.update');
        Route::get('/delete/{id}', 'delete')->name('admin.drugs.delete');

        Route::get('/issue/{medical_booking_id}', 'issue')->name('admin.drugs.issue');
        Route::get('/prescriptions', 'prescriptions')->name('admin.drugs.prescriptions');
    });

    Route::prefix('feedbacks')->controller(FeedbackController::class)->group(function() {
        Route::get('/all', 'index')->name('admin.feedbacks.index');
    });
});