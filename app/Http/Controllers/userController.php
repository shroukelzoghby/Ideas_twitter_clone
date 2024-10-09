<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class userController extends Controller
{


    public function show(User $user)
    {
        $ideas = $user->ideas()->paginate(5);
       return view('users.show', compact('user','ideas'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $ideas = $user->ideas()->paginate(5);
        $editing =true;
        return view('users.show', compact('user','editing','ideas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(User $user)
    {
        //
    }

}
