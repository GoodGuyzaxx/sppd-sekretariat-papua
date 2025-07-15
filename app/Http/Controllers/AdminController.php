<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public static function middleware(): array
    {
        return [
            'auth',
            'checkrole:1',
        ];
    }

    public function index(){
        return view('admin.index');
    }
}
