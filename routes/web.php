<?php

use App\Http\Livewire\Admin\CreateTrainer;
use App\Http\Livewire\Admin\EnrollPackage;
use App\Http\Livewire\Trainer\Details;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Admin\ManagePackage;
use App\Http\Livewire\Admin\ManageTimeslot;
use App\Http\Livewire\Admin\NewMembers;
use App\Http\Livewire\Admin\Notification;
use App\Http\Livewire\Admin\ShowMember;
use App\Http\Livewire\Admin\ShowPackage;
use App\Http\Livewire\Admin\ShowTrainer;
use App\Http\Livewire\Member\Dietplan;
use App\Http\Livewire\Member\MemberDetails;
use App\Http\Livewire\Member\ShowMypackage;
use App\Http\Livewire\Packages;
use App\Http\Livewire\Payment;
use App\Http\Livewire\Trainer\AssignDietPlan;
use App\Http\Livewire\Trainer\ManageDietPlan;
use App\Http\Livewire\Trainer\SessionMembers;
use App\Http\Livewire\Trainer\UploadDietPlan;
use App\Http\Livewire\Trainer\Vitalinfo as TrainerVitalinfo;
use App\Models\VitalInfo;

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

Route::get('/', function () {
    return view('home');
});
Route::get('/about-us', function () {
    return view('aboutus');
});
Route::get('/contact-us', function () {
    return view('contactus');
});
Route::get('/packages',Packages::class)->name('packages');

Route::prefix('admin')->name('admin.')->middleware(['auth','role:admin'])->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    Route::get('/trainer/create',CreateTrainer::class)->name('trainer.create');
    Route::get('/trainers',ShowTrainer::class)->name('trainer.show');
    Route::get('/packages',ShowPackage::class)->name('package.show');
    Route::get('/package/create',ManagePackage::class)->name('package.create');
    Route::get('/package/{id}/update',ManagePackage::class)->name('package.update');
    Route::get('/timeslot/create',ManageTimeslot::class)->name('timeslot.create');
    Route::get('/timeslot/{id}/update',ManageTimeslot::class)->name('timeslot.update');
    Route::get('/members',ShowMember::class)->name('member.show');
    Route::get('/member/enroll/requests',NewMembers::class)->name('member.enroll.requests');
    Route::get('/member/enroll/add/{id}',EnrollPackage::class)->name('member.enroll');
    Route::get('/notification/{id}',Notification::class)->name('notification.user');
    Route::get('/notification',Notification::class)->name('notification.all');

});

Route::prefix('trainer')->name('trainer.')->middleware(['auth','role:trainer'])->group(function () {
    Route::get('/dashboard', function () {
        return view('trainer.dashboard');
    })->name('dashboard')->middleware('details');

    Route::get('/details',Details::class)->name('details');
    Route::get('/session/{id}/members',SessionMembers::class)->name('session.members');
    Route::get('/diet-plan/upload',UploadDietPlan::class)->name('dietplan.upload');
    Route::get('/diet-plan/upload/{id}',UploadDietPlan::class)->name('dietplan.upload.update');
    Route::get('/diet-plans',ManageDietPlan::class)->name('dietplan.show');
    Route::get('/diet-plan/assign/{id}',AssignDietPlan::class)->name('dietplan.assign');
    Route::get('/vitalinfo/{id}',TrainerVitalinfo::class)->name('vitalinfo');
});


Route::prefix('member')->name('member.')->middleware(['auth','role:member'])->group(function () {
    Route::get('/dashboard', function () {
        return view('member.dashboard');
    })->name('dashboard')->middleware('details');

    Route::get('/details',MemberDetails::class)->name('details');
    Route::get('/my-packages',ShowMypackage::class)->name('mypackage.show');
    Route::get('/payment/{id}',Payment::class)->name('payment');
    Route::get('/diet-plan',Dietplan::class)->name('dietplan.download');


});

require __DIR__.'/auth.php';
