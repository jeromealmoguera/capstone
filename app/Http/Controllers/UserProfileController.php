<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Models\Personnel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpKernel\Event\ViewEvent;

class UserProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::with('personnel')->get();
        $documents = Document::with('personnel')->get();

        return view('profile.my-profile', compact('user', 'documents'));
    }

    /**
     * Show the form for creating a new resource.
     */

     public function documents()
     {
        // Retrieve the authenticated user
        $user = Auth::user();

        if ($user) {
            // Retrieve the associated personnel
            $personnel = $user->personnel;

            if ($personnel) {
                // Retrieve the documents
                $documents = $personnel->documents;

                return view('profile.my-document', compact('documents'));
            }
        }

        return 'User or personnel not found.';

     }



    public function accountSetting()
    {
        return view('profile.my-account');
    }

    public function otherInfo()

    {
        return view('profile.my-info');
    }

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
