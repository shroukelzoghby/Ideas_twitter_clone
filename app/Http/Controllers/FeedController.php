<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Http\Request;

class FeedController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $followingsIds =auth()->user()->followings()->pluck('user_id');

        $ideas = Idea::whereIn('user_id', $followingsIds)->latest();

        if(request()->has('search'))
        {
            $ideas=$ideas->where('content','like','%'.request('search').'%');
        }

        return view('dashboard',['ideas' => $ideas->paginate(5)]);
    }
}
