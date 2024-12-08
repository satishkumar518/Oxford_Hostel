<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\BookRoomController;
use App\Http\Controllers\PaymentController;


// home page
Route::get('/', [HomeController::class, 'home'])->name('home');   


// admin route
Route::middleware('admin')->group(function () {
    Route::get('admin/dashboard', [AdminController::class, 'dashboard'])->name('Admin_Dashboard');
    // admin manage dashboard route
    Route::prefix('admin')->group(function () {
    Route::get('/addroom', [RoomController::class, 'addroom'])->name('addroom');
    Route::post('/addroom', [RoomController::class, 'insert'])->name('add_room_submit');
    Route::get('/manageroom', [RoomController::class, 'manageroom'])->name('manageroom');
    Route::get('/delete/{id}', [RoomController::class, 'delete'])->name('room.delete');
    

    Route::get('/edit/{id}', [RoomController::class, 'editroom'])->name('editroom');
    Route::post('/updateroom/{id}', [RoomController::class, 'updateroom'])->name('updateroom');

    Route::get('/editstudent/{id}', [StudentController::class, 'editstudent'])->name('editstudent');
    Route::post('/update/{id}', [StudentController::class, 'updatestudent'])->name('updatestudent');

    // manage request route
    Route::get('/manage-request', [BookRoomController::class, 'manageRequest'])->name('manageRequest');
    Route::get('/update-request/{id}', [BookRoomController::class, 'updateRequest'])->name('updateRequest');
    Route::post('/update-Submit/{id}', [BookRoomController::class, 'updateSubmit'])->name('updateSubmit');

    // view booking details
    Route::get('/view-student-booking-details', [BookRoomController::class, 'viewStudentBookingDetails'])->name('StudentBookingDetails');
    Route::get('/delete-booked-room/{id}', [BookRoomController::class, 'delete'])->name('deletebookedroom');

    // view payment details
    Route::get('/view-payment', [PaymentController::class, 'viewPaymentDetails'])->name('viewPayment');
    Route::get('/delete-payment/{id}', [PaymentController::class, 'deletePayment'])->name('deletePayment');
    

    Route::get('/addstudent', [StudentController::class, 'addstudent'])->name('addstudent');
    Route::post('/addstudent', [StudentController::class, 'student_register_sumbit'])->name('student_register_sumbit');
    Route::get('/managestudent', [StudentController::class, 'managestudent'])->name('managestudent');

    Route::get('/change-password',[AdminController::class, 'change_password'])->name('change_password');
    Route::post('/change-password',[AdminController::class, 'update_password'])->name('update_password');

    Route::get('/view-profile',[AdminController::class, 'viewProfile'])->name('adminProfile');



    
    
});
});
Route::prefix('admin')->group(function () {
    Route::get('/login', [AdminController::class, 'login'])->name('Admin_Login');
    Route::post('/login_submit', [AdminController::class, 'admin_login_submit'])->name('Admin_Login_Submit');
    Route::get('/logout', [AdminController::class, 'logout'])->name('Admin_Logout');

    // forgot Password route
    Route::get('/forgot', [AdminController::class, 'forgot_password'])->name('admin_forgot_password');
    Route::post('/forgot', [AdminController::class, 'forgot_password_submit'])->name('admin_forgot_password_submit');
    Route::get('/reset/{token}', [AdminController::class, 'reset'])->name('reset');
    Route::post('reset_password/{token}', [AdminController::class, 'reset_password'])->name('reset_password');
    // Route::post('/reset_password_submit/{token}', [AdminController::class, 'reset_password_submit'])->name('reset_password_submit');

});




// User route
Route::middleware('student')->group(function () {
    Route::get('student/dashboard', [StudentController::class, 'dashboard'])->name('Student_Dashboard');

    Route::get('/change-password',[StudentController::class, 'student_change_password'])->name('student_change_password');
    Route::post('/change-password',[StudentController::class, 'student_update_password'])->name('student_update_password');

    Route::get('/book-hostel',[PaymentController::class, 'showBookHostelForm'])->name('BookHostelForm');
    Route::post('/book-hostel',[PaymentController::class, 'bookroom'])->name('bookroom');
    Route::get('/esewa',[PaymentController::class, 'esewa'])->name('esewa');
    Route::post('/esewa',[PaymentController::class, 'esewaPay'])->name('esewaPay');

    Route::get('/success',[PaymentController::class, 'esewaPaySuccess']);
    Route::get('/failure',[PaymentController::class, 'esewaPayFailure']);

    // view booking details
    Route::get('/view-booking-details', [BookRoomController::class, 'viewBookDetails'])->name('viewBookDetails');

    Route::get('/view-profile',[StudentController::class, 'viewProfile'])->name('studentProfile');

    // view payment details
    Route::get('/view-student-payment', [PaymentController::class, 'viewStudentPayment'])->name('viewStudentPayment');
    Route::get('/delete-student-payment/{id}', [PaymentController::class, 'deleteStudentPayment'])->name('deleteStudentPayment');


});
Route::prefix('student')->group(function () {
    Route::get('/login', [StudentController::class, 'login'])->name('Student_Login');
    Route::get('/register', [StudentController::class, 'register'])->name('Student_Register');
    Route::post('/addstudent', [StudentController::class, 'student_register_sumbit'])->name('student_register_sumbit');

    Route::post('/login_submit', [StudentController::class, 'student_login_submit'])->name('Student_Login_Submit');
    Route::get('/logout', [StudentController::class, 'logout'])->name('Student_Logout');

    Route::get('/forgot', [StudentController::class, 'forgot_password'])->name('forgot_password');
    Route::post('/forgot', [StudentController::class, 'forgot_password_submit'])->name('forgot_password_submit');
    Route::get('/reset/{token}', [StudentController::class, 'reset'])->name('reset');
    Route::post('reset_password/{token}', [StudentController::class, 'reset_password'])->name('reset_password');
});






