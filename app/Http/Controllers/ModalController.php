<?php

namespace GonnaSolve\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use GonnaSolve\User;

class ModalController extends Controller
{
    public function loadModal($id) {
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
