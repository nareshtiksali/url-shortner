<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\Url;
use app\Models\User;
use Illuminate\Support\Facades\Hash;

class SuperAdminController extends Controller
{
    public function index()
    {
       /* $companies = Company::all();
        $urls = Url::all();*/

        $companies = Company::withCount('users')
        ->with(['users.urls']) // eager load
        ->limit(5) 
        ->get()
        ->map(function ($company) {

        $totalUrls = $company->users->flatMap->urls->count();

        $totalHits = $company->users
            ->flatMap->urls
            ->sum('hits');

        return [
            'name' => $company->name,
            'email' => $company->email,
            'total_users' => $company->users_count,
            'total_urls' => $totalUrls,
            'total_hits' => $totalHits,
        ];
        
    });

    $urls = Url::with(['user.company']) ->limit(5)->get()->map(function ($url) {
        return [
            'short_url' => $url->short_code,
            'long_url' => $url->original_url,
            'company_name' => optional($url->user->company)->name,
            'hits' => $url->hits,
            'created_at' => $url->created_at->format('Y-m-d H:i:s'),
        ];
    });
        return view('superadmin.dashboard', compact('companies', 'urls'));
    }

    public function createCompany()
    {
        // Restrict access
        if (!auth()->user()->isSuperAdmin()) {
            abort(403);
        }

        return view('superadmin.invite-company');
    }
    
    public function storeCompany(Request $request)
    {
        if (!auth()->user()->isSuperAdmin()) {
            abort(403);
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:companies,email',
        ]);

        Company::create([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        return redirect('/superadmin/dashboard')
        ->with('success', 'Company Created successfully!');
    }

    public function createAdmin()
    {
        $companies = Company::all();

        return view('superadmin.create-admin', compact('companies'));
    }

    public function storeAdmin(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'company_id' => 'required|exists:companies,id',
        ]);

        // Get Admin role ID
        $adminRoleId = \App\Models\Role::where('name', 'admin')->first()->id;

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'company_id' => $request->company_id,
            'role_id' => $adminRoleId,
            'parent_id' => auth()->id(), // current user is parent 
        ]);

            return redirect('/superadmin/dashboard')
        ->with('success', 'Admin Created successfully!');
    }

    public function allCompanies()
    {
        $companies = Company::withCount('users')
            ->with(['users.urls'])
            ->paginate(10)
            ->through(function ($company) {

                $totalUrls = $company->users->flatMap->urls->count();

                $totalHits = $company->users
                    ->flatMap->urls
                    ->sum('hits');

                return [
                    'id' => $company->id,
                    'name' => $company->name,
                    'email' => $company->email,
                    'total_users' => $company->users_count,
                    'total_urls' => $totalUrls,
                    'total_hits' => $totalHits,
                ];
            });

        return view('superadmin.companies', compact('companies'));
    }

    public function allUrls()
    {
        $urls = Url::with(['user.company'])
            ->latest()
            ->paginate(10)
            ->through(function ($url) {
                return [
                    'short_url' => $url->short_code,
                    'long_url' => $url->original_url,
                    'company_name' => optional($url->user->company)->name,
                    'hits' => $url->hits,
                    'created_at' => $url->created_at->format('Y-m-d H:i:s'),
                ];
            });

        return view('superadmin.urls', compact('urls'));
    }
}