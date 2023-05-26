<?php

namespace App\Http\Controllers;

use App\Models\Personnel;
use App\Models\Document;
use App\Models\User;
use Illuminate\Http\Request;

class UserRoleController extends Controller
{
    public function index()
    {




        return view('user.my-profile');
    }
}
