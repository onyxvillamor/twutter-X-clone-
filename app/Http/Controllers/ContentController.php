<?php

namespace App\Http\Controllers;

use App\Models\Twutter;
use Illuminate\Http\Request;

class ContentController extends Controller
{
    public function store(){

         $twutter = Twutter::create([
            'content' => request()->get('content', null)
        ]);

        return redirect()->route('dashboard');
    }
}
