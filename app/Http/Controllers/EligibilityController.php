<?php

namespace App\Http\Controllers;
use App\Models\Eligibility;
use App\Models\Personnel;
use Carbon\Carbon;
use Illuminate\Http\Request;

class EligibilityController extends Controller

{


    public function createEligibility(Request $request, Personnel $personnel)
    {
        $request->validate([
            'title' => 'required',
            'rating' => 'required',
            'exam_date' => 'required|date',
            'location' => 'required',
            'license' => 'required',
            'validity_period' => 'required|date',
        ]);

        $eligibility = new Eligibility($request->all());
        $eligibility->personnel_id = $personnel->id;
        $eligibility->exam_date = Carbon::createFromFormat('m/d/Y', $request->exam_date)->format('Y-m-d');
        $eligibility->validity_period = Carbon::createFromFormat('m/d/Y', $request->validity_period)->format('Y-m-d');
        $eligibility->save();

        return redirect()->route('view.profile', $personnel)
            ->with('success', 'Eligibility added successfully.');
    }

    public function updateEligibility(Request $request, Eligibility $eligibility)
    {
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

        return redirect()->route('view.profile', $eligibility->personnel)
            ->with('success', 'Eligibility updated successfully.');
    }

    public function deleteEligibility($id)
    {
        $eligibility = Eligibility::find($id);
        if ($eligibility) {
            $eligibility->delete();
            return redirect()->back()->with('success', 'Eligibility has been deleted successfully.');
        } else {
            return redirect()->back()->with('error', 'Eligibility not found.');
        }
    }

}
