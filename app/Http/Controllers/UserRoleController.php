<?php

namespace App\Http\Controllers;

use App\Models\Personnel;
use App\Models\Document;
use App\Models\EducationBackground;
use App\Models\Eligibility;
use App\Models\FamilyBackground;
use App\Models\Training;
use App\Models\User;
use App\Models\VoluntaryWork;
use App\Models\WorkExperience;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UserRoleController extends Controller
{

    public function userDashboard()
    {
        
        return view('layouts.partials.user-content');
    }
    public function index()
    {

        return view('user.my-profile');
    }

    //-- Family CRUD -- //

    public function showFamily()

    {
            // Retrieve the authenticated user
    $user = Auth::user();

    // Get the associated personnel record for the user
    $personnel = $user->personnel;



    // Retrieve the family backgrounds for the personnel
    $backgrounds = $personnel->familyBackgrounds;

        return view('user.tabs.my-family', compact('backgrounds'));
    }

    public function updateFamily(Request $request, $id)
    {
        // Find the family background record
        $familyBackground = FamilyBackground::findOrFail($id);

        // Check if the authenticated user owns the family background
        if ($familyBackground->personnel->user_id !== Auth::id()) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        // Update the family background record
        $familyBackground->update($request->all());

        return redirect()->back()->with('success', 'Family background updated successfully');
    }

    public function storeFamily(Request $request)
    {
        // Get the authenticated user
        $user = Auth::user();

        // Get the associated personnel record for the user
        $personnel = $user->personnel;

        // Create a new family background record
        $familyBackground = new FamilyBackground($request->all());

        // Associate the family background with the personnel
        $personnel->familyBackgrounds()->save($familyBackground);

        return redirect()->back()->with('success', 'Family background created successfully');
    }

    public function deleteFamily($id)
    {
        // Find the family background record
        $familyBackground = FamilyBackground::findOrFail($id);

        // Check if the authenticated user owns the family background
        if ($familyBackground->personnel->user_id !== Auth::id()) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        // Delete the family background record
        $familyBackground->delete();

        return redirect()->back()->with('success', 'Family background deleted successfully');
    }


    //--- End Family CRUD --- //


    // -- Education Crud -- //

    public function showEducation()
    {
         // Retrieve the authenticated user
        $user = Auth::user();

        // Get the associated personnel record for the user
        $personnel = $user->personnel;

        // Retrieve the family backgrounds for the personnel
        $educations = $personnel->educationBackgrounds;

        return view('user.tabs.my-education', compact('educations'));
    }

        public function updateEducation(Request $request, $id)
        {
            // Find the education background record
            $educations = EducationBackground::findOrFail($id);

            // Check if the authenticated user owns the education background
            if ($educations->personnel->user_id !== Auth::id()) {
                return response()->json(['error' => 'Unauthorized'], 401);
            }

            // Update the education background record
            $request->validate([
                'acad_level' => 'required',
                'school_name' => 'required',
                'course' => 'required',
                'start_year' => 'required|date',
                'end_year' => 'required|date|after:start_year',
                'unit_earned' => 'required|integer',
                'grad_year' => 'nullable|date|after:start_year',
                'acad_honors' => 'nullable',
            ]);

            $educations->fill($request->all());
            $educations->start_year = Carbon::createFromFormat('m/d/Y', $request->start_year)->format('Y-m-d');
            $educations->end_year = Carbon::createFromFormat('m/d/Y', $request->end_year)->format('Y-m-d');
            if ($request->grad_year) {
                $educations->grad_year = Carbon::createFromFormat('m/d/Y', $request->grad_year)->format('Y-m-d');
            } else {
                $educations->grad_year = null;
            }
            $educations->save();

            return redirect()->back()->with('success', 'Education background updated successfully');
        }

        public function storeEducation(Request $request)
        {
            // Get the authenticated user
            $user = Auth::user();

            // Get the associated personnel record for the user
            $personnel = $user->personnel;

            // Create a new education background record
            $educations = new EducationBackground($request->all());

            // Associate the education background with the personnel
            $personnel->educationBackgrounds()->save($educations);

            return redirect()->back()->with('success', 'Education background updated successfully');
        }

        public function deleteEducation($id)
        {
            // Find the education background record
            $educations = EducationBackground::findOrFail($id);

            // Check if the authenticated user owns the education background
            if ($educations->personnel->user_id !== Auth::id()) {
                return response()->json(['error' => 'Unauthorized'], 401);
            }

            // Delete the education background record
            $educations->delete();

            return redirect()->back()->with('success', 'You have deleted your education record');
        }

    // End Education Crud --- //

    public function showEligibility()
    {
          // Retrieve the authenticated user
          $user = Auth::user();

          // Get the associated personnel record for the user
          $personnel = $user->personnel;

          // Retrieve the family backgrounds for the personnel
          $eligibilities = $personnel->eligibilities;

        return view('user.tabs.my-eligibility', compact('eligibilities'));
    }

    public function updateEligibility(Request $request, $id)
    {
        // Find the eligibility record
        $eligibility = Eligibility::findOrFail($id);

        // Check if the authenticated user owns the eligibility
        if ($eligibility->personnel->user_id !== Auth::id()) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        // Update the eligibility record
        $request->validate([
            'title' => 'required',
            'rating' => 'required',
            'exam_date' => 'required|date',
            'location' => 'required',
            'license' => 'required',
            'validity_period' => 'required|date',
        ]);

        $eligibility->update([
            'title' => $request->title,
            'rating' => $request->rating,
            'exam_date' => Carbon::createFromFormat('m/d/Y', $request->exam_date)->format('Y-m-d'),
            'location' => $request->location,
            'license' => $request->license,
            'validity_period' => Carbon::createFromFormat('m/d/Y', $request->validity_period)->format('Y-m-d'),
        ]);


        return redirect()->back()->with('success', 'You have updated an eligibility');
    }

    public function storeEligibility(Request $request)
    {
        // Get the authenticated user
        $user = Auth::user();

        // Get the associated personnel record for the user
        $personnel = $user->personnel;

        // Create a new eligibility record
        $eligibility = new Eligibility($request->all());

        // Associate the eligibility with the personnel
        $personnel->eligibilities()->save($eligibility);

        return redirect()->back()->with('success', 'A new eligibility has been added');
    }

    public function deleteEligibility($id)
    {
        // Find the eligibility record
        $eligibility = Eligibility::findOrFail($id);

        // Check if the authenticated user owns the eligibility
        if ($eligibility->personnel->user_id !== Auth::id()) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        // Delete the eligibility record
        $eligibility->delete();

        return redirect()->back()->with('success', 'You have deleted a record for eligibility');
    }


//Experience

    public function showExperience()
    {

         // Retrieve the authenticated user
         $user = Auth::user();

         // Get the associated personnel record for the user
         $personnel = $user->personnel;

         // Retrieve the family backgrounds for the personnel
         $workExperience = $personnel->workExperiences;

        return view('user.tabs.my-experience', compact('workExperience'));
    }

    public function updateExperience(Request $request, $id)
    {
        // Find the work experience record
        $workExperience = WorkExperience::findOrFail($id);

        // Check if the authenticated user owns the work experience
        if ($workExperience->personnel->user_id !== Auth::id()) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        // Update the work experience record
        $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'position' => 'required',
            'department' => 'required',
            'salary' => 'required|numeric',
            'pay_grade' => 'required',
            'appointment_status' => 'required',
            'gov_service' => 'required',
        ]);

        $workExperience->update([
            'start_date' => Carbon::createFromFormat('m/d/Y', $request->start_date)->format('Y-m-d'),
            'end_date' => Carbon::createFromFormat('m/d/Y', $request->end_date)->format('Y-m-d'),
            'position' => $request->position,
            'department' => $request->department,
            'salary' => $request->salary,
            'pay_grade' => $request->pay_grade,
            'appointment_status' => $request->appointment_status,
            'gov_service' => $request->gov_service,
        ]);

        return redirect()->back()->with('success', 'You have updated work experience');
    }

    public function storeExperience(Request $request)
    {
        // Get the authenticated user
        $user = Auth::user();

        // Get the associated personnel record for the user
        $personnel = $user->personnel;

        // Create a new work experience record
        $workExperience = new WorkExperience($request->all());

        // Associate the work experience with the personnel
        $personnel->workExperiences()->save($workExperience);

        return redirect()->back()->with('Work experience created successfully');
    }

    public function deleteExperience($id)
    {
        // Find the work experience record
        $workExperience = WorkExperience::findOrFail($id);

        // Check if the authenticated user owns the work experience
        if ($workExperience->personnel->user_id !== Auth::id()) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        // Delete the work experience record
        $workExperience->delete();

        return redirect()->back()->with('Work experience deleted successfully');
    }

//End Experience

    public function showVolunteers()
    {
        // Retrieve the authenticated user
        $user = Auth::user();

        // Get the associated personnel record for the user
        $personnel = $user->personnel;

        // Retrieve the family backgrounds for the personnel
        $voluntaryWork = $personnel->voluntaryWorks;
        return view('user.tabs.my-volunteers', compact('voluntaryWork'));
    }

    public function updateVoluntary(Request $request, $id)
    {
        // Find the voluntary work record
        $voluntaryWork = VoluntaryWork::findOrFail($id);

        // Check if the authenticated user owns the voluntary work
        if ($voluntaryWork->personnel->user_id !== Auth::id()) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        // Update the voluntary work record
        $request->validate([
            'org_name' => 'required',
            'org_address' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'hours_no' => 'required|integer',
            'position' => 'required',
        ]);

        $voluntaryWork->org_name = $request->org_name;
        $voluntaryWork->org_address = $request->org_address;
        $voluntaryWork->start_date = Carbon::createFromFormat('m/d/Y', $request->start_date)->format('Y-m-d');
        $voluntaryWork->end_date = Carbon::createFromFormat('m/d/Y', $request->end_date)->format('Y-m-d');
        $voluntaryWork->hours_no = $request->hours_no;
        $voluntaryWork->position = $request->position;
        $voluntaryWork->save();


        return redirect()->back()->with('Voluntary work updated successfully');
    }

    public function storeVoluntary(Request $request)
    {
        // Get the authenticated user
        $user = Auth::user();

        // Get the associated personnel record for the user
        $personnel = $user->personnel;

        // Create a new voluntary work record
        $voluntaryWork = new VoluntaryWork($request->all());

        // Associate the voluntary work with the personnel
        $personnel->voluntaryWorks()->save($voluntaryWork);

        return redirect()->back()->with('Voluntary work created successfully');
    }

    public function deleteVoluntary($id)
    {
        // Find the voluntary work record
        $voluntaryWork = VoluntaryWork::findOrFail($id);

        // Check if the authenticated user owns the voluntary work
        if ($voluntaryWork->personnel->user_id !== Auth::id()) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        // Delete the voluntary work record
        $voluntaryWork->delete();

        return redirect()->back()->with('Voluntary work deleted successfully');
    }

    //End voluntary Works

    public function showTrainings()
    {
        // Retrieve the authenticated user
        $user = Auth::user();

        // Get the associated personnel record for the user
        $personnel = $user->personnel;

        // Retrieve the family backgrounds for the personnel
        $trainings = $personnel->trainings;
        return view('user.tabs.my-trainings', compact('trainings'));
    }

    public function updateTrainings(Request $request, $id)
    {
        // Find the training record
        $training = Training::findOrFail($id);

        // Check if the authenticated user owns the training
        if ($training->personnel->user_id !== Auth::id()) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        // Update the training record
        $request->validate([
            'title' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'hours_no' => 'required|integer',
            'ld_type' => 'required',
            'sponsor' => 'required',
        ]);

        $training->title = $request->title;
        $training->start_date = Carbon::createFromFormat('m/d/Y', $request->start_date)->format('Y-m-d');
        $training->end_date = Carbon::createFromFormat('m/d/Y', $request->end_date)->format('Y-m-d');
        $training->hours_no = $request->hours_no;
        $training->ld_type = $request->ld_type;
        $training->sponsor = $request->sponsor;
        $training->save();

        return redirect()->back()->with('Training updated successfully');
    }

    public function storeTrainings(Request $request)
    {
        // Get the authenticated user
        $user = Auth::user();

        // Get the associated personnel record for the user
        $personnel = $user->personnel;

        // Create a new training record
        $training = new Training($request->all());

        // Associate the training with the personnel
        $personnel->trainings()->save($training);

        return redirect()->back()->with('Training created successfully');
    }

    public function deleteTrainings($id)
    {
        // Find the training record
        $training = Training::findOrFail($id);

        // Check if the authenticated user owns the training
        if ($training->personnel->user_id !== Auth::id()) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        // Delete the training record
        $training->delete();

        return redirect()->back()->with('Training deleted successfully');
    }


    // Show documents of the authenticated user
    public function showDocuments()
    {
        // Retrieve the authenticated user
        $user = Auth::user();

        // Get the associated personnel record for the user
        $personnel = $user->personnel;

        // Retrieve the documents for the personnel from the previous year
        $previousYear = date('Y') - 1;
        $documents = $personnel->documents()->whereYear('issued_date', $previousYear)->get();

        return view('user.my-documents', compact('documents'));
    }

    public function previewDocument($id)
{
    $document = Document::findOrFail($id);

    // Check if the document belongs to the authenticated user
    if ($document->personnel->user_id !== Auth::id()) {
        abort(403); // Or you can redirect to an error page
    }

    $path = storage_path('app/' . $document->file_path);
    return response()->file($path);
}

public function downloadDocument($id)
{
    $document = Document::findOrFail($id);

    // Check if the document belongs to the authenticated user
    if ($document->personnel->user_id !== Auth::id()) {
        abort(403); // Or you can redirect to an error page
    }

    // Set the download headers
    $downloadHeaders = [
        'Content-Type' => 'application/octet-stream',
    ];

    return Storage::download($document->file_path, $document->file_name, $downloadHeaders);
}

public function deleteDocument($id)
{
    $document = Document::findOrFail($id);

    // Check if the document belongs to the authenticated user
    if ($document->personnel->user_id !== Auth::id()) {
        abort(403); // Or you can redirect to an error page
    }

    // Delete the document file from storage
    Storage::delete($document->file_path);

    // Delete the document record from the database
    $document->delete();

    return redirect()->back()->with('success', 'Document deleted successfully.');
}


}
