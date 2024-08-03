<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){

        $users = [
            [
                'name' => 'Alex',
                'age' => '21'
            ],
            [
                'name' => 'Charlie',
                'age' => '29'
            ],
            [
                'name' => 'Kendra',
                'age' => '17'
            ]
        ];
        return view('dashboard',['users' => $users]);
    }
}
