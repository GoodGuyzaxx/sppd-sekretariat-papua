<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectController extends Controller
{
    public function dashboard()
    {
        $user = Auth::user();

        return match ($user->role_id) {
            1 => redirect()->route('admin.dashboard'),
            2 => redirect()->route('sekre.dashboard'),
            3 => redirect()->route('kasubag.dashboard'),
            4 => redirect()->route('staff.dashboard'),
            default => redirect()->route('staff.dashboard'),
        };
    }

    public function cek(Request $request)
    {
        // Your existing logic for the cek method
        return $this->dashboard();
    }
}
