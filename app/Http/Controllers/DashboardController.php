<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Models\Personnel;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function dashboard()
    {
        //Demographics
        $totalUsers = User::count();
        $totalDocuments = Document::count();
        $totalPersonnel = Personnel::count();
        //End - Demographics

        //Incomplete Required Document List
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
            $personnel = Personnel::get();

            // Retrieve the document count for each personnel
            $personnelWithDocumentCount = [];
            foreach ($personnel as $person) {
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

            // Take only 5 records for display in the table
            $displayedPersonnel = $incompletePersonnel->take(8);

            $incompletePersonnelCount = $incompletePersonnel->count();

            //Document by Type
           // Retrieve all document types
            $documentTypes = ['Personal Data Sheet', 'Diploma/TOR', 'Physical Fitness Test', 'Trainings', 'Specialized Trainings', 'SALN', 'KSS', 'PER', 'Reassignments', 'Eligibility'];

            // Retrieve the document count for each document type
            $documentTypeCounts = [];
            foreach ($documentTypes as $documentType) {
                $documentCount = Document::where('document_type', $documentType)->count();
                $documentTypeCounts[$documentType] = $documentCount;
            }

            // ...

            return view('layouts.partials.admin-content', compact('totalUsers', 'totalDocuments', 'totalPersonnel', 'previousYear', 'requiredDocumentTypes', 'displayedPersonnel', 'incompletePersonnelCount', 'documentTypeCounts'));


        }

    public function showDashboard()
    {
        $documentCounts = DB::table('documents')
            ->select('document_type', DB::raw('count(*) as total'))
            ->groupBy('document_type')
            ->get();

        return view('layouts.partials.admin-content', compact('documentCounts'));
    }


}
