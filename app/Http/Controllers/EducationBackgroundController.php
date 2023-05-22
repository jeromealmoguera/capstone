<?php

namespace App\Http\Controllers;

use App\Models\EducationBackground;
use App\Models\Personnel;
use Carbon\Carbon;
use Illuminate\Http\Request;

class EducationBackgroundController extends Controller
{
        public function createEducationBackground(Request $request, Personnel $personnel)
    {
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

        $educationBackground = new EducationBackground($request->all());
        $educationBackground->personnel_id = $personnel->id;
        $educationBackground->start_year = Carbon::createFromFormat('m/d/Y', $request->start_year)->format('Y-m-d');
        $educationBackground->end_year = Carbon::createFromFormat('m/d/Y', $request->end_year)->format('Y-m-d');
        if ($request->grad_year) {
            $educationBackground->grad_year = Carbon::createFromFormat('m/d/Y', $request->grad_year)->format('Y-m-d');
        }
        $educationBackground->save();

        return redirect()->route('view.profile', $personnel)
            ->with('success', 'Education background added successfully.');
    }

    public function updateEducationBackground(Request $request, EducationBackground $educationBackground)
    {
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

        $educationBackground->fill($request->all());
        $educationBackground->start_year = Carbon::createFromFormat('m/d/Y', $request->start_year)->format('Y-m-d');
        $educationBackground->end_year = Carbon::createFromFormat('m/d/Y', $request->end_year)->format('Y-m-d');
        if ($request->grad_year) {
            $educationBackground->grad_year = Carbon::createFromFormat('m/d/Y', $request->grad_year)->format('Y-m-d');
        } else {
            $educationBackground->grad_year = null;
        }
        $educationBackground->save();

        return redirect()->route('view.profile', $educationBackground->personnel)
            ->with('success', 'Education background updated successfully.');
    }

    public function deleteEducationBackground($id)
    {
        $educationBackground = EducationBackground::find($id);
        if ($educationBackground) {
            $educationBackground->delete();
            return redirect()->back()->with('success', 'Education background has been deleted successfully.');
        } else {
            return redirect()->back()->with('error', 'Education background not found.');
        }
    }

}
