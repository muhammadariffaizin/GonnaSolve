<?php

namespace GonnaSolve\Http\Controllers;

use Illuminate\Http\Request;
use GonnaSolve\User;

class ModalController extends Controller
{
    public function loadModal() {
        return view('edit_profile');
    }

    public function update(Request $request) {
        User::where('id', $request->id)->update([
            'name' => $request->name,
            'description' => $request->description,
            'email' => $request->email,
        ]);
        return redirect()->route('dashboard');
    }
}
