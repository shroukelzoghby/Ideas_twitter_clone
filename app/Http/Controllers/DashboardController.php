<?php

namespace App\Http\Controllers;

use App\Mail\WelcomeEmail;
use App\Models\Idea;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    function index()
    {

        $ideas = Idea::orderBy('created_at', 'desc');

        if(request()->has('search'))
        {
            $ideas=$ideas->where('content','like','%'.request('search').'%');
        }

        return view('dashboard',['ideas' => $ideas->paginate(5)]);
    }
}
