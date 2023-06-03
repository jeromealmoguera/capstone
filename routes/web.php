<?php

use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\RolesController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\PersonnelController;
use App\Http\Controllers\PersonnelProfileController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ShowIncompleteController;
use App\Http\Controllers\SMSController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserRoleController;
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
            return view('layouts.partials.user-content');
        })->name('dashboard');

        Route::get('/my-profile', [UserRoleController::class, 'index'])->name('view.my-info');
        //Fdamily
        Route::get('/my-family-members', [UserRoleController::class, 'showFamily'])->name('view.my-family');
        Route::post('/add-family-members', [UserRoleController::class, 'storeFamily'])->name('add.my-familyMember');
        Route::put('/family/{id}', [UserRoleController::class, 'updateFamily'])->name('edit.my-familyMember');
        Route::delete('/family/{id}', [UserRoleController::class, 'deleteFamily'])->name('delete.my-familyMember');
        //Eduction
        Route::get('/my-education', [UserRoleController::class, 'showEducation'])->name('view.my-education');
        Route::post('my-profile/add-education', [UserRoleController::class, 'storeEducation'])->name('add.my-education');
        Route::put('my-profile/education/update/{id}', [UserRoleController::class, 'updateEducation'])->name('edit.my-education');
        Route::delete('my-profile/family/delete/{id}', [UserRoleController::class, 'deleteEducation'])->name('delete.my-education');
        //Eligibility
        Route::get('/my-eligibility', [UserRoleController::class, 'showEligibility'])->name('view.my-eligibility');
        Route::post('my-profile/add-eligibility', [UserRoleController::class, 'storeEligibility'])->name('add.my-eligibility');
        Route::put('my-profile/eligibility/update/{id}', [UserRoleController::class, 'updateEligibility'])->name('edit.my-eligibility');
        Route::delete('my-profile/eligibility/delete/{id}', [UserRoleController::class, 'deleteEligibility'])->name('delete.my-eligibility');
        //Work Experience
        Route::get('/my-experience', [UserRoleController::class, 'showExperience'])->name('view.my-experience');
        Route::post('my-profile/add-experience', [UserRoleController::class, 'storeExperience'])->name('add.my-experience');
        Route::put('my-profile/experience/update/{id}', [UserRoleController::class, 'updateExperience'])->name('edit.my-experience');
        Route::delete('my-profile/experience/delete/{id}', [UserRoleController::class, 'deleteExperience'])->name('delete.my-experience');
        //Voluntary Works
        Route::get('/my-volunteers', [UserRoleController::class, 'showVolunteers'])->name('view.my-volunteers');
        Route::post('my-profile/add-voluntary-works', [UserRoleController::class, 'storeVoluntary'])->name('add.my-volunteers');
        Route::put('my-profile/voluntary-works/update/{id}', [UserRoleController::class, 'updateVoluntary'])->name('edit.my-volunteers');
        Route::delete('my-profile/voluntary-works/delete/{id}', [UserRoleController::class, 'deleteVoluntary'])->name('delete.my-volunteers');
        //Trainings
        Route::get('/my-trainings', [UserRoleController::class, 'showTrainings'])->name('view.my-trainings');
        Route::post('my-profile/add-trainings', [UserRoleController::class, 'storeTrainings'])->name('add.my-trainings');
        Route::put('my-profile/trainings/update/{id}', [UserRoleController::class, 'updateTrainings'])->name('edit.my-trainings');
        Route::delete('my-profile/trainings/delete/{id}', [UserRoleController::class, 'deleteTrainings'])->name('delete.my-trainings');
        //Documents
        Route::get('/my-documents', [UserRoleController::class, 'showDocuments'])->name('view.my-document');
        Route::get('/documents/{id}/preview', [UserRoleController::class, 'previewDocument'])->name('my-documents.preview');
        Route::get('/documents/{id}/download', [UserRoleController::class, 'downloadDocument'])->name('my-documents.download');
        Route::delete('/documents/{id}/delete', [UserRoleController::class, 'deleteDocument'])->name('my-documents.delete');
    });

    Route::middleware(['role:admin'])->group(function () {
        Route::get('/admin-dashboard', function () {
            return view('layouts.partials.admin-content');
        })->name('admin.dashboard');

    });



    // Routes accessible only to users with "admin" role
    Route::middleware(['role:admin'])->prefix('/admin')->group(function () {

        Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('admin.dashboard');
        Route::resource('/roles', RolesController::class );
        //Roles
        Route::post('/roles/{role}/permissions', [RolesController::class, 'givePermission'])->name('roles.permissions');
        Route::delete('/roles/{role}/permissions/{permission}', [RolesController::class, 'revokePermission'])->name('roles.permissions.revoke');
        //Permission
        Route::post('/permissions/{permission}/roles', [PermissionController::class, 'giveRole'])->name('permissions.roles');
        Route::delete('permissions/{permission}/roles/{role}', [PermissionController::class, 'removeRole'])->name('permissions.roles.remove');
        Route::resource('/permissions', PermissionController::class);

        //Personnel Profile Pages w/ Overview
        Route::get('/personnel-list', [PersonnelController::class, 'index'])->name('personnel-list');
        Route::get('/personnel/active', [PersonnelController::class, 'getActive'])->name('personnel.active');
        Route::get('/personnel/inactive', [PersonnelController::class, 'getInactive'])->name('personnel.inactive');


        Route::get('/view/personnel-profile/{id}', [PersonnelController::class, 'view'])->name('view.personnel.profile');
        Route::get('/personnel/create', [App\Http\Controllers\PersonnelProfileController::class, 'create'])->name('personnel.create');
        Route::post('/personnel/store', [App\Http\Controllers\PersonnelProfileController::class, 'store'])->name('personnel.store');

        //View Document Page /Personnel Profile
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

        //Document Resource
        Route::get('/document-listing', [DocumentController::class, 'index'])->name('view.documents-lists');
        Route::post('/documents', [DocumentController::class, 'store'])->name('documents.store');
        Route::get('/documents/{id}/download', [DocumentController::class, 'download'])->name('documents.download');
        Route::get('/documents/{id}/preview', [DocumentController::class, 'preview'])->name('documents.preview');
        Route::delete('/documents/{id}', [DocumentController::class, 'destroy'])->name('documents.destroy');
        //User Management
        Route::get('/user-listing', [UserController::class, 'showUser'])->name('user.lists');
        Route::get('/users-manage/{user}/view-profile', [UserController::class, 'show'])->name('users.show');

        Route::post('/users', [UserController::class, 'store'])->name('users.store');

        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

        //SMS
        Route::any('send-sms', [SMSController::class, 'send'])->name('send.sms');

        //Personnel w/ incomplete documents list
        Route::get('/personnel/incomplete', [ShowIncompleteController::class, 'index'])->name('personnel.incomplete');

        //change status route in the personnel list
        Route::get('personnel/{id}/change-status/{status}', [PersonnelController::class, 'changeStatus'])->name('change.personnel.status');



    });

});



require __DIR__.'/auth.php';
