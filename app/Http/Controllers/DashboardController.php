<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use App\Models\Twutter;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        // $twutter = new Twutter([
        //     'content' => 'sheeshableshaa'
        // ]);

        // $twutter->save();

        return view('dashboard', [
            'twutters' => Twutter::orderBy('created_at', 'DESC')->get()
        ]);
    }
}
