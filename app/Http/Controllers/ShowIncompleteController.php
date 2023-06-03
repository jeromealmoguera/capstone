<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Models\Personnel;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ShowIncompleteController extends Controller
{
    public function index()
    {
        $currentYear = Carbon::now()->year;
        $previousYear = $currentYear - 1;

        $requiredDocumentTypes = ['Personal Data Sheet', 'Diploma/TOR', 'Physical Fitness Test', 'Trainings', 'Specialized Trainings', 'SALN', 'KSS', 'PER', 'Reassignments', 'Eligibility'];

        $incompletePersonnel = Document::select('personnel_id')
            ->whereYear('issued_date', $previousYear)
            ->groupBy('personnel_id')
            ->havingRaw('COUNT(DISTINCT document_type) < ?', [count($requiredDocumentTypes)])
            ->get();

        $personnelIds = $incompletePersonnel->pluck('personnel_id')->toArray();

        // Retrieve all the personnel
        $personnels = Personnel::get();

        // Retrieve the document count for each personnel
        $personnelWithDocumentCount = [];
        foreach ($personnels as $person) {
            $documentCount = Document::where('personnel_id', $person->id)
                ->whereYear('issued_date', $previousYear)
                ->count();

            $person->documents_count = $documentCount;
            $personnelWithDocumentCount[] = $person;
        }

        // Filter out personnel who have completed all the required documents
        $incompletePersonnel = collect($personnelWithDocumentCount)->filter(function ($person) use ($requiredDocumentTypes) {
            return $person->documents_count < count($requiredDocumentTypes);
        });

        $incompletePersonnelCount = $incompletePersonnel->count();

        return view('admin.pages.personnel.incomplete-documents', compact('previousYear','requiredDocumentTypes','incompletePersonnel', 'incompletePersonnelCount'));
    }
}
