<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Url;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;


class MemberController extends Controller
{
   public function index()
    {
        $user = Auth::user();

        $urls = Url::where('user_id', $user->id)
            ->latest()
            ->get();

        return view('member.dashboard', compact('urls'));
    }

    public function createUrl()
    {
        return view('member.create-url');
    }

     public function storeUrl(Request $request)
        {
            $request->validate([
                'long_url' => 'required|url',
            ]);

            $user = Auth::user();

            $shortCode =  Str::random(6);

            Url::create([
                'original_url' => $request->long_url,
                'short_code' => $shortCode,
                'user_id'      => $user->id,     
                'company_id'   => $user->company_id, 
                'hits'         => 0,
            ]);

            return redirect()
                ->route('member.dashboard')
                ->with('success', 'URL created successfully!');
        }
}
