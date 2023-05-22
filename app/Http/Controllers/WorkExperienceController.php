<?php

namespace App\Http\Controllers;

use App\Models\Personnel;
use App\Models\WorkExperience;
use Carbon\Carbon;
use Illuminate\Http\Request;

class WorkExperienceController extends Controller
{
    public function createWorkExperience(Request $request, Personnel $personnel)
    {
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

        $workExperience = new WorkExperience($request->all());
        $workExperience->personnel_id = $personnel->id;
        $workExperience->start_date = Carbon::createFromFormat('m/d/Y', $request->start_date)->format('Y-m-d');
        $workExperience->end_date = Carbon::createFromFormat('m/d/Y', $request->end_date)->format('Y-m-d');
        $workExperience->save();

        return redirect()->route('view.profile', $personnel)
            ->with('success', 'Work experience added successfully.');
    }

    public function updateWorkExperience(Request $request, WorkExperience $workExperience)
    {
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

        return redirect()->route('view.profile', $workExperience->personnel)
            ->with('success', 'Work experience updated successfully.');
    }

    public function deleteWorkExperience($id)
    {
        $workExperience = WorkExperience::find($id);
        if ($workExperience) {
            $workExperience->delete();
            return redirect()->back()->with('success', 'Work experience has been deleted successfully.');
        } else {
            return redirect()->back()->with('error', 'Work experience not found.');
        }
    }
}
