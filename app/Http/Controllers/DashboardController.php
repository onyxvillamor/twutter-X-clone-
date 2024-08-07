<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use App\Models\Twutter;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){

        $twutter = Twutter::orderBy('created_at', 'DESC');

        if(request()->has('search')){
            $twutter = $twutter->where('content', 'like', '%' . request()->get('search', '') . '%');
        }


        return view('dashboard', ['twutters' =>$twutter->paginate(5)]);
    }
}
