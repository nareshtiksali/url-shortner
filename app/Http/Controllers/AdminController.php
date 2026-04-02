<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Url;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;



class AdminController extends Controller
{
    public function index()
    {
        $admin = Auth::user();

        $urls = Url::whereHas('user', function ($query) use ($admin) {
            $query->where('company_id', $admin->company_id);
        })->latest()->take(5)->get();

         $admin = Auth::user();

         //members under the admin
         /* $users = User::where('parent_id', $admin->id)
        ->with('company') // optional
        ->latest()
        ->get(); */

        $users = User::where('parent_id', $admin->id)
        ->with(['company', 'role'])
        ->latest()
        ->paginate(10);


        return view('admin.dashboard', compact('urls', 'users'));
    }

    public function createUser()
    {
        return view('admin.create-user');
    }

    public function storeUser(Request $request)
    {
        $request->validate([
            'name'  => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'role' => 'required|in:admin,member',
        ]);

        $loggedInUser = auth()->user();

        // Get role ID
        $role = Role::where('name', $request->role)->first();

        User::create([
            'name'       => $request->name, 
            'email' => $request->email,
            'password' => Hash::make('123456'), // default 12346 sabhi k liye
            'company_id' => $loggedInUser->company_id,
            'role_id' => $role->id,
            'parent_id' => $loggedInUser->id, // 
        ]);

        return redirect()
            ->route('admin.dashboard') 
            ->with('success', 'User created successfully!');
    }
}
