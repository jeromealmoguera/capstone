<?php

namespace App\Http\Controllers;

use App\Models\FamilyBackground;
use App\Models\Personnel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PersonnelProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function create()

    {
        return view('admin.pages.personnel.create');
    }

    public function store(Request $request)
    {
        // Validate the user's input
        $validatedData = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'gender' => 'required',
            'unit' => 'required',
            'sub_unit' => 'required',
            'designation' => 'required',
            'status' => 'required',
        ]);

        // Create the new personnel record
        $personnel = new Personnel;
        $personnel->first_name = $validatedData['first_name'];
        $personnel->middle_name = $request->input('middle_name');
        $personnel->last_name = $validatedData['last_name'];
        $personnel->birth_date = Carbon::createFromFormat('m/d/Y', $request->birth_date)->format('Y-m-d');
        $personnel->birth_place = $request->input('birth_place');
        $personnel->gender = $validatedData['gender'];
        $personnel->civil_status = $request->input('civil_status');
        $personnel->citizenship = $request->input('citizenship');
        $personnel->blood_type = $request->input('blood_type');
        $personnel->height = $request->input('height');
        $personnel->weight = $request->input('weight');
        $personnel->mobile_no = $request->input('mobile_no');
        $personnel->tel_no = $request->input('tel_no');
        $personnel->home_street = $request->input('home_street');
        $personnel->home_city = $request->input('home_city');
        $personnel->home_province = $request->input('home_province');
        $personnel->home_zip = $request->input('home_zip');
        $personnel->current_street = $request->input('current_street');
        $personnel->current_city = $request->input('current_city');
        $personnel->current_province = $request->input('current_province');
        $personnel->current_zip = $request->input('current_zip');
        $personnel->ranks = $request->input('ranks');
        $personnel->unit = $validatedData['unit'];
        $personnel->sub_unit = $validatedData['sub_unit'];
        $personnel->station = $request->input('station');
        $personnel->designation = $validatedData['designation'];
        $personnel->status = $validatedData['status'];
        $personnel->user_id = Auth::id();
        $personnel->save();

        // Redirect the user to the newly created personnel's profile
        return redirect()->route('view.profile', $personnel->id);
    }


    public function edit($id)
    {
        $personnel = Personnel::findOrFail($id);
        return view('admin.pages.personnel.edit-personnel', compact('personnel'));
    }


    public function update(Request $request, $id)
{
    // Validate the user's input
    $validatedData = $request->validate([
        'first_name' => 'required',
        'last_name' => 'required',
        'gender' => 'required',
    ]);

    // Find the personnel record to update
    $personnel = Personnel::find($id);

    // Update the personnel record with the new data
    $personnel->first_name = $validatedData['first_name'];
    $personnel->middle_name = $request->input('middle_name');
    $personnel->last_name = $validatedData['last_name'];
    $personnel->birth_date = Carbon::createFromFormat('m/d/Y', $request->birth_date)->format('Y-m-d');
    $personnel->birth_place = $request->input('birth_place');
    $personnel->gender = $validatedData['gender'];
    $personnel->civil_status = $request->input('civil_status');
    $personnel->citizenship = $request->input('citizenship');
    $personnel->blood_type = $request->input('blood_type');
    $personnel->height = $request->input('height');
    $personnel->weight = $request->input('weight');
    $personnel->mobile_no = $request->input('mobile_no');
    $personnel->tel_no = $request->input('tel_no');
    $personnel->home_street = $request->input('home_street');
    $personnel->home_city = $request->input('home_city');
    $personnel->home_province = $request->input('home_province');
    $personnel->home_zip = $request->input('home_zip');
    $personnel->current_street = $request->input('current_street');
    $personnel->current_city = $request->input('current_city');
    $personnel->current_province = $request->input('current_province');
    $personnel->current_zip = $request->input('current_zip');
    $personnel->user_id = Auth::id();
    $personnel->save();

    // Redirect the user to the updated personnel's profile
    return redirect()->route('view.profile', $personnel->id)
            ->with('success', 'Information has  been successfully updated.');
}


    //View Profile
     public function showProfile(Personnel $personnel)
     {

         return view('admin.pages.personnel.personnel-profile' , compact('personnel'));
     }


   public function createFamilyMember(Request $request, Personnel $personnel)
   {
        $request->validate([
            'name' => 'required',
            'relationship' => 'required',
            'occupation' => 'required',
            'employer' => 'required',
            'business_address' => 'required'
        ]);

        $familyBackground = new FamilyBackground($request->all());
        $familyBackground->personnel_id = $personnel->id;
        $familyBackground->save();

        return redirect()->route('view.profile', $personnel)
            ->with('success', 'Family background added successfully.');
   }


    //Update Method for familyBackground
   public function updateFamilyMember(Request $request, FamilyBackground $familyBackground)
    {
    $request->validate([
        'name' => 'required',
        'relationship' => 'required',
        'occupation' => 'required',
        'employer' => 'required',
        'business_address' => 'required'
    ]);

    $familyBackground->update($request->all());

    return redirect()->route('view.profile', $familyBackground->personnel)
        ->with('success', 'Family background updated successfully.');
    }


    //Delete method for familyBackground
   public function deleteFamilyMember($id)

    {
        $familyBackground = FamilyBackground::find($id);
        if ($familyBackground) {
            $familyBackground->delete();
            return redirect()->back()->with('success', 'Family Member has been deleted successfully.');
        } else {
            return redirect()->back()->with('error', 'Family Member not found.');
        }
    }




}
