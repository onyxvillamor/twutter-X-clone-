<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use App\Models\Twutter;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){


        return view('dashboard', [
            'twutters' => Twutter::orderBy('created_at', 'DESC')->paginate(5)
        ]);
    }
}
