<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatIdeaRequest;
use App\Http\Requests\UpdateIdeaRequest;
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
    public function store(CreatIdeaRequest $request){

        $validated=$request->validated();
        $validated['user_id']=auth()->id();

         Idea::create($validated);

        return redirect()->route('dashboard')->with('success','Idea added successfully');


    }
    public function edit(Idea $idea){
        Gate::authorize('update', $idea);
        $editing=true;
        return view('ideas.show',compact('idea','editing'));

    }
    public function update(UpdateIdeaRequest $request,Idea $idea){

        Gate::authorize('update',$idea);

        $validated = $request->validated();
        $idea->update($validated);
        return redirect()->route('ideas.show',$idea->id)->with('success','Idea updated successfully');
    }

    public function destroy(Idea $idea){

        Gate::authorize('delete',$idea);
        $idea->delete();
        return redirect()->route('dashboard')->with('success','Idea deleted successfully');
    }


}
