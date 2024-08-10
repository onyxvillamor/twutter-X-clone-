<?php

namespace App\Http\Controllers;

use App\Models\Twutter;
use Illuminate\Http\Request;

class ContentController extends Controller
{
    public function show(Twutter $content)
    {


        return view('contents.show', ['content' => $content]);
    }

    public function store()
    {


       $validated =  request()->validate([
            'content' => 'required|min:3|max:240'
        ]);

        $validated['user_id'] = auth()->id();

        Twutter::create($validated);

        return redirect()->route('dashboard')->with('success', 'Content created successfully!');
    }

    public function edit(Twutter $content)
    {
        if(auth()->id() !== $content->user_id){
            abort(404);
        }

        $editing = true;
        return view('contents.show', compact('content', 'editing'));
    }

    public function destroy(Twutter $content)
    {
        if(auth()->id() !== $content->user_id){
            abort(404);
        }
        
        $content->delete();
        return redirect()->route('dashboard')->with('success', 'Content deleted successfully!');
    }

    public function update(Twutter $content)
    {
        if(auth()->id() !== $content->user_id){
            abort(404);
        }

        $validated = request()->validate([
            'content' => 'required|min:3|max:240'
        ]);

        $content->update($validated);

        return redirect()->route('contents.show', $content->id)->with('success', 'Content updated successfully');
    }
}
