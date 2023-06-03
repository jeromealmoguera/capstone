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

            // Take only 5 records for display in the table
            $displayedPersonnel = $incompletePersonnel->take(9);

            $incompletePersonnelCount = $incompletePersonnel->count();

            //Document by Type Chart//

            //Personal Data Sheets Count
            $personalDataSheets = DB::table('documents')
            ->where('document_type', 'Personal Data Sheet')
            ->whereYear('issued_date', '>=', $previousYear)
            ->whereYear('issued_date', '<=', $currentYear)
            ->get();

            $personalDataSheetCounts = $personalDataSheets->count();

            //Diploma Count
            $diploma = DB::table('documents')
            ->where('document_type', 'Diploma/TOR')
            ->whereYear('issued_date', '>=', $previousYear)
            ->whereYear('issued_date', '<=', $currentYear)
            ->get();

            $diplomaCounts = $diploma->count();

            //Trainings Count
            $trainings = DB::table('documents')
            ->where('document_type', 'Trainings')
            ->whereYear('issued_date', '>=', $previousYear)
            ->whereYear('issued_date', '<=', $currentYear)
            ->get();

            $trainingCounts = $trainings->count();

            //Specialized Trainings Count
            $specialTrainings = DB::table('documents')
            ->where('document_type', 'Specialized Trainings')
            ->whereYear('issued_date', '>=', $previousYear)
            ->whereYear('issued_date', '<=', $currentYear)
            ->get();

            $specialTrainingCounts = $specialTrainings->count();

            //Reassignment Count
            $reassignments = DB::table('documents')
            ->where('document_type', 'Reassignments')
            ->whereYear('issued_date', '>=', $previousYear)
            ->whereYear('issued_date', '<=', $currentYear)
            ->get();

            $reassignmentCounts = $reassignments->count();

             //SalN Count
             $salN = DB::table('documents')
             ->where('document_type', 'SALN')
             ->whereYear('issued_date', '>=', $previousYear)
             ->whereYear('issued_date', '<=', $currentYear)
             ->get();

             $salNCounts = $salN->count();

             //PER Count
             $per = DB::table('documents')
             ->where('document_type', 'PER')
             ->whereYear('issued_date', '>=', $previousYear)
             ->whereYear('issued_date', '<=', $currentYear)
             ->get();

             $perCounts = $per->count();

             //PFT Count
             $pft = DB::table('documents')
             ->where('document_type', 'Physical Fitness Test')
             ->whereYear('issued_date', '>=', $previousYear)
             ->whereYear('issued_date', '<=', $currentYear)
             ->get();

             $pftCounts = $pft->count();

             //KSS Count
             $kss = DB::table('documents')
             ->where('document_type', 'KSS')
             ->whereYear('issued_date', '>=', $previousYear)
             ->whereYear('issued_date', '<=', $currentYear)
             ->get();

             $kssCounts = $kss->count();

             //Eligibility Count
             $eligibility = DB::table('documents')
             ->where('document_type', 'Eligibility')
             ->whereYear('issued_date', '>=', $previousYear)
             ->whereYear('issued_date', '<=', $currentYear)
             ->get();

             $eligibilityCounts = $eligibility->count();

            return view('layouts.partials.admin-content', compact('totalUsers', 'totalDocuments', 'totalPersonnel', 'previousYear', 'requiredDocumentTypes', 'displayedPersonnel',
            'incompletePersonnelCount', 'personalDataSheetCounts', 'diplomaCounts', 'trainingCounts', 'specialTrainingCounts', 'reassignmentCounts', 'salNCounts', 'perCounts', 'pftCounts', 'kssCounts', 'eligibilityCounts'));


        }




}
