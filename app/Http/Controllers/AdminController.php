<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class AdminController extends Controller
{
    //
    public function index(){
        if (! Gate::allows('is_admin')) {
            abort(403);
        }else{
            $currentUser = auth()->user();
            return view('dashboard.index');
        }
    }
}
