<?php

use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\RolesController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PersonnelController;
use App\Http\Controllers\PersonnelProfileController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Models\User;
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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        if (auth()->user()->hasRole('admin')) {
            return redirect()->route('admin.dashboard');
        } elseif (auth()->user()->hasRole('user')) {
            return redirect()->route('dashboard');
        }
    });

    Route::middleware(['role:user'])->group(function () {
        Route::get('/user-dashboard', function () {
            return view('dashboard');
        })->name('dashboard');
    });

    Route::middleware(['role:admin'])->group(function () {
        Route::get('/admin', function () {
            return view('admin.index');
        })->name('admin.dashboard');
    });

    // Routes accessible only to users with "admin" role
    Route::middleware(['role:admin'])->prefix('/admin')->group(function () {

        Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
        Route::resource('/roles', RolesController::class );
        //Roles
        Route::post('/roles/{role}/permissions', [RolesController::class, 'givePermission'])->name('roles.permissions');
        Route::delete('/roles/{role}/permissions/{permission}', [RolesController::class, 'revokePermission'])->name('roles.permissions.revoke');
        //Permission
        Route::post('/permissions/{permission}/roles', [PermissionController::class, 'giveRole'])->name('permissions.roles');
        Route::delete('permissions/{permission}/roles/{role}', [PermissionController::class, 'removeRole'])->name('permissions.roles.remove');
        Route::resource('/permissions', PermissionController::class);

        //Personnel Profile Pages
        Route::get('/personnel-list', [PersonnelController::class, 'index'])->name('personnel-list');
        Route::get('/view/personnel-profile/{id}', [PersonnelController::class, 'view'])->name('view.personnel.profile');
        Route::get('/personnel/create', [App\Http\Controllers\PersonnelProfileController::class, 'create'])->name('personnel.create');
        Route::post('/personnel/store', [App\Http\Controllers\PersonnelProfileController::class, 'store'])->name('personnel.store');

        //View Document Page
        Route::get('/view/personnel-documents/{id}', [PersonnelController::class, 'viewDocuments'])->name('view.personnel.documents');
        //Document Upload
        Route::post('/upload/document/{personnel_id}', [PersonnelController::class, 'upload'])->name('upload.document');
        Route::post('/personel-documents/documents/delete-multiple', [PersonnelController::class, 'deleteMultiple'])->name('documents.delete-multiple');
        Route::post('/personnel/{personnelId}/documents', [PersonnelController::class, 'store'])->name('documents.store');
        Route::delete('/personnel-profile/documents/delete/{id}', [PersonnelController::class, 'deleteDocument'])->name('documents.delete');
        Route::get('/personnel-profile/documents/{id}/download', [PersonnelController::class, 'downloadDocument'])->name('documents.download');
        Route::get('/personnel-profile/documents/{id}/preview', [PersonnelController::class, 'previewDocument'])->name('documents.preview');
        //change pass
        Route::get('personnel/{id}/change-password', [PersonnelController::class, 'changePassForm'])->name('change-password');
        Route::post('personnel/{id}/change-password', [PersonnelController::class, 'changePass'])->name('view.personnel.change-password');
        Route::get('/view/personnel/account-setting', [PersonnelController::class, 'accountSetting'])->name('view.personnel.account-setting');

        Route::get('/personnel-profile/{personnel}/view', [PersonnelProfileController::class, 'showProfile'])->name('view.profile');
        Route::get('/personnel-profile/{id}/edit', [PersonnelProfileController::class, 'edit'])->name('edit.personnel');
        Route::put('/personnel-profile/{id}/update', [PersonnelProfileController::class, 'update'])->name('update.personnel');

        //Personnel-Profile View: FamilyBackground
        Route::post('/personnel/{personnel}/view/family-member', [PersonnelProfileController::class, 'createFamilyMember'])->name('add.new-member');
        Route::put('personnel/family-background/{familyBackground}/edit', [PersonnelProfileController::class, 'updateFamilyMember'])->name('edit.family-member');
        Route::delete('personnel/family-members/{id}/delete', [PersonnelProfileController::class, 'deleteFamilyMember'])->name('delete.family-member');
        //Personnel-Profile View: EducationBackground
        Route::post('/personnel/{personnel}/view/education', [\App\Http\Controllers\EducationBackgroundController::class, 'createEducationBackground'])->name('add.education');
        Route::put('personnel/education-background/{educationBackground}/edit', [\App\Http\Controllers\EducationBackgroundController::class, 'updateEducationBackground'])->name('edit.education');
        Route::delete('personnel/education-background/{id}/delete', [\App\Http\Controllers\EducationBackgroundController::class, 'deleteEducationBackground'])->name('delete.education');
        //Personnel-Profile View: Eligibility
        Route::post('personnel/{personnel}/view/eligibilities', [\App\Http\Controllers\EligibilityController::class, 'createEligibility'])->name('add.eligibility');
        Route::put('personnel/eligibilities/{eligibility}/edit', [\App\Http\Controllers\EligibilityController::class, 'updateEligibility'])->name('edit.eligibility');
        Route::delete('personnel/eligibilities/{eligibility}/delete', [\App\Http\Controllers\EligibilityController::class, 'deleteEligibility'])->name('delete.eligibility');
        //Personnel-Profile View: Work Experience
        Route::post('/personnel/{personnel}/view/work-experiences', [\App\Http\Controllers\WorkExperienceController::class, 'createWorkExperience'])->name('add.work-experience');
        Route::put('personnel/work-experiences/{workExperience}/edit', [\App\Http\Controllers\WorkExperienceController::class, 'updateWorkExperience'])->name('edit.work-experience');
        Route::delete('personnel/work-experiences/{id}/delete', [\App\Http\Controllers\WorkExperienceController::class, 'deleteWorkExperience'])->name('delete.work-experience');
        //Personnel-Profile View: Voluntary Work
        Route::post('/personnel/{personnel}/view/voluntary-work', [\App\Http\Controllers\VoluntaryWorkController::class, 'createVoluntaryWork'])->name('add.voluntary_work');
        Route::put('/personnelvoluntary-work/{voluntaryWork}/edit', [\App\Http\Controllers\VoluntaryWorkController::class, 'updateVoluntaryWork'])->name('edit.voluntary_work');
        Route::delete('/personnel/voluntary-work/{id}/delete', [\App\Http\Controllers\VoluntaryWorkController::class, 'deleteVoluntaryWork'])->name('delete.voluntary_work');
        //Personnel-Profile View:Trainngs
        Route::post('/personnel/{personnel}/view/training', [\App\Http\Controllers\TrainingController::class, 'createTraining'])->name('add.training');
        Route::put('personnel/training/{training}/edit', [\App\Http\Controllers\TrainingController::class, 'updateTraining'])->name('edit.training');
        Route::delete('personnel/training/{id}/delete', [\App\Http\Controllers\TrainingController::class, 'deleteTraining'])->name('delete.training');

        //User Management
        Route::get('/user-listing', [UserController::class, 'showUser'])->name('user.lists');
        Route::get('/users-manage/{user}/view-profile', [UserController::class, 'show'])->name('users.show');

        Route::post('/users', [UserController::class, 'store'])->name('users.store');

        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });

});



require __DIR__.'/auth.php';
