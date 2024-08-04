<?php

namespace App\Http\Controllers;

use App\Models\Twutter;
use Illuminate\Http\Request;

class ContentController extends Controller
{
    public function store(){

        request()->validate([
            'content' => 'required|min:5|max:240'
        ]);

        Twutter::create(['content' => request()->get('content', null)]);

        return redirect()->route('dashboard')->with('success','Content created successfully!');
    }
}
