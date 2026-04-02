<?php

namespace App\Http\Controllers;

use App\Models\Url;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;


class UrlController extends Controller
{
    public function create()
    {
        return view('dashboard.generateurl');
    }

    public function store(Request $request)
    {
        if (Auth::user()->isSuperAdmin()) {
         return redirect()->back()->with('error', 'SuperAdmin cannot create URLs.');
        }
        
        $request->validate([
            'long_url' => 'required|url',
        ]);

        $user = Auth::user();

        Url::create([
            'original_url' => $request->long_url,
            'short_code' => Str::random(6),
            'user_id' => $user->id,
            'company_id' => $user->company_id,
            'hits' => 0,
        ]);

        $user = auth()->user();

         if ($user->isAdmin()) {
            return redirect()->route('admin.dashboard')->with('success', 'URL generated successfully!');
        } elseif ($user->isMember()) {
            return redirect()->route('member.dashboard')->with('success', 'URL generated successfully!'); 
        }else {
            //return redirect()->route('superadmin.dashboard');
        }
    }  
    
    public function redirect($short_code)
    {
        $url = \App\Models\Url::where('short_code', $short_code)->first();

        if (!$url) {
            abort(404);
        }

        // increment hits
        $url->increment('hits');

        // redirect to original URL
        return redirect()->away($url->original_url);
    }

}
