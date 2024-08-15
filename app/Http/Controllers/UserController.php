<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{




    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
       $contents = $user->contents()->paginate(5);
        return view('users.show', compact('user', 'contents'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $editing = true;
        $contents = $user->contents()->paginate(5);
        return view('users.show', compact('user','editing', 'contents'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(User $user)
    {
        //
    }

    public function profile(){
        return $this->show(auth()->user());
    }


}
