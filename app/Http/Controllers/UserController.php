<?php

namespace App\Http\Controllers;

use App\Models\Personnel;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function showUser()

    {
        $userCount = User::count();
        $users = User::with('roles')->whereNotIn('name', ['admin'])->get();
        $roles = Role::get();



        return view('admin.pages.account-manager.user-lists', compact('userCount', 'users', 'roles'));
    }



public function store(Request $request)
{
    // Validate the form data
    $request->validate([
        'name' => 'required',
        'email' => 'required|email|unique:users',
        'password' => 'required|min:8',
        'role' => 'required|exists:roles,id',
    ]);

    // Create a new user
    $user = User::create([
        'name' => $request->input('name'),
        'email' => $request->input('email'),
        'password' => bcrypt($request->input('password')),
    ]);

    // Assign the selected role to the user
    $role = Role::findById($request->input('role'));
    $user->assignRole($role);

    // Redirect or show success message
    return redirect()->back()->with('success', 'User created successfully.');
}


    public function show(User $user)
    {
        $personnel = $user->personnel;

        if (!$personnel) {
            return redirect()->route('personnel.create');
        }

        return redirect()->route('view.profile', $personnel);

    }


    public function deleteUser(Request $request, $id)
    {

    // Get the user being deleted
    $user = User::find($id);

    // Check if the user exists
    if (!$user) {
        return redirect()->route('user.lists')->with('error', 'User not found.');
    }

    // Check if the entered password matches the password of the logged-in user
    if (!Hash::check($request->password, Auth::user()->password)) {
        return redirect()->back()->withErrors(['password' => 'Incorrect password.'])->withInput();
    }

    // Delete the user
    $user->delete();

    // Redirect back to user list with success message
    return redirect()->route('user.lists')->with('success', 'User deleted successfully.');

    }


    public function authorizePassword($password)
    {
        return $this->getAuthPassword($password);
    }

}
