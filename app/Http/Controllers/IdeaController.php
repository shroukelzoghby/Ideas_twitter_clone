<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Gate;

class IdeaController extends Controller
{
    public function show(Idea $idea)
    {
        return view('ideas.show',['idea'=>$idea]);
    }
    public function store(){

        $validated=request()->validate([
           'content'=>'required|min:5|max:240'
        ]);
        $validated['user_id']=auth()->id();

         Idea::create($validated);

        return redirect()->route('dashboard')->with('success','Idea added successfully');


    }
    public function edit(Idea $idea){
        Gate::authorize('idea.edit', $idea);
        $editing=true;
        return view('ideas.show',compact('idea','editing'));

    }
    public function update(Idea $idea){

        Gate::authorize('idea.edit',$idea);

        $validated = request()->validate([
            'content'=>'required|min:5|max:240'
        ]);
        $idea->update($validated);
        return redirect()->route('ideas.show',$idea->id)->with('success','Idea updated successfully');
    }

    public function destroy(Idea $idea){

        Gate::authorize('idea.delete',$idea);
        $idea->delete();
        return redirect()->route('dashboard')->with('success','Idea deleted successfully');
    }


}
