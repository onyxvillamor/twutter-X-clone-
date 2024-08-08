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

        Twutter::create($validated);

        return redirect()->route('dashboard')->with('success', 'Content created successfully!');
    }

    public function edit(Twutter $content)
    {
        $editing = true;
        return view('contents.show', compact('content', 'editing'));
    }

    public function destroy(Twutter $id)
    {
        $id->delete();
        return redirect()->route('dashboard')->with('success', 'Content deleted successfully!');
    }

    public function update(Twutter $content)
    {

        $validated = request()->validate([
            'content' => 'required|min:3|max:240'
        ]);

        $content->update($validated);

        return redirect()->route('contents.show', $content->id)->with('success', 'Content updated successfully');
    }
}
