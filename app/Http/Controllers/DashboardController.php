<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Models\Personnel;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $totalUsers = User::count();
        $totalDocuments = Document::count();
        $totalPersonnel = Personnel::count();
        $personnel = Personnel::with('documents')->get();
        $latestDocuments = Document::with('personnel')->latest()->take(5)->get();

        return view('layouts.partials.admin', compact('totalUsers', 'totalDocuments','totalPersonnel', 'personnel', 'latestDocuments'));
    }

}
