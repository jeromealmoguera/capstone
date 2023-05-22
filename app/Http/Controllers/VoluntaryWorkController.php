<?php

namespace App\Http\Controllers;

use App\Models\Personnel;
use App\Models\VoluntaryWork;
use Carbon\Carbon;
use Illuminate\Http\Request;

class VoluntaryWorkController extends Controller
{
    public function createVoluntaryWork(Request $request, Personnel $personnel)
    {
        $request->validate([
            'org_name' => 'required',
            'org_address' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'hours_no' => 'required|integer',
            'position' => 'required',
        ]);

        $voluntaryWork = new VoluntaryWork($request->all());
        $voluntaryWork->personnel_id = $personnel->id;
        $voluntaryWork->start_date = Carbon::createFromFormat('m/d/Y', $request->start_date)->format('Y-m-d');
        $voluntaryWork->end_date = Carbon::createFromFormat('m/d/Y', $request->end_date)->format('Y-m-d');
        $voluntaryWork->save();

        return redirect()->route('view.profile', $personnel)
            ->with('success', 'Voluntary work added successfully.');
    }

    public function updateVoluntaryWork(Request $request, VoluntaryWork $voluntaryWork)
    {
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

        return redirect()->route('view.profile', $voluntaryWork->personnel)
            ->with('success', 'Voluntary work updated successfully.');
    }

    public function deleteVoluntaryWork($id)
    {
        $volunteer = VoluntaryWork::find($id);
        if ($volunteer) {
            $volunteer->delete();
            return redirect()->back()->with('success', 'Voluntary Work has been deleted successfully.');
        } else {
            return redirect()->back()->with('error', 'Voluntary Work not found.');
        }
    }
}

