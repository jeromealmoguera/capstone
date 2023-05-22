<?php

namespace App\Http\Controllers;

use App\Models\Personnel;
use App\Models\Training;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TrainingController extends Controller
{
        public function createTraining(Request $request, Personnel $personnel)
    {
        $request->validate([
            'title' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'hours_no' => 'required|integer',
            'ld_type' => 'required',
            'sponsor' => 'required',
        ]);

        $training = new Training($request->all());
        $training->personnel_id = $personnel->id;
        $training->start_date = Carbon::createFromFormat('m/d/Y', $request->start_date)->format('Y-m-d');
        $training->end_date = Carbon::createFromFormat('m/d/Y', $request->end_date)->format('Y-m-d');
        $training->save();

        return redirect()->route('view.profile', $personnel)
            ->with('success', 'Training added successfully.');
    }

    public function updateTraining(Request $request, Training $training)
    {
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

        return redirect()->route('view.profile', $training->personnel)
            ->with('success', 'Training updated successfully.');
    }

    public function deleteTraining($id)
    {
        $training = Training::find($id);
        if ($training) {
            $training->delete();
            return redirect()->back()->with('success', 'Training has been deleted successfully.');
        } else {
            return redirect()->back()->with('error', 'Training not found.');
        }
    }
}
