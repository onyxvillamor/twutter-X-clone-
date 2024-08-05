<?php

namespace App\Http\Controllers;

use App\Models\Twutter;
use Illuminate\Http\Request;

class ContentController extends Controller
{
    public function show(Twutter $content){
        return view('contents.show',[
            'content' => $content
        ]);
    }

    public function store(){

        request()->validate([
            'content' => 'required|min:5|max:240'
        ]);

        Twutter::create(['content' => request()->get('content', null)]);

        return redirect()->route('dashboard')->with('success','Content created successfully!');
    }

    public function destroy(Twutter $id){
        $id->delete();
        return redirect()->route('dashboard')->with('success','Content deleted successfully!');
    }
}
