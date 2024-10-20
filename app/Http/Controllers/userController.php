<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

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
        Gate::authorize('update', $user);
        $ideas = $user->ideas()->paginate(5);
        $editing =true;
        return view('users.edit', compact('user','editing','ideas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update( UpdateUserRequest $request,User $user)
    {
        Gate::authorize('update', $user);
        $validate = request()->validated();

        if($request->has('image')){
            $imagePath = request()->file('image')->store('profile', 'public');
            $validate['image'] = $imagePath;

            Storage::disk('public')->delete($user->image ?? '');
        }
        $user->update($validate);
        return redirect()->route('profile');
    }
    public function profile(){
        return $this->show(auth()->user());
    }

}
