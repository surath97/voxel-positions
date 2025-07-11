<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('auth.login');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // $data = $request->session()->all();
        // dd($data);
        //--------------------------------------------------


        // validate
        $attributes = $request->validate([
            'email'     => ['required', 'email'],
            'password'  => ['required'],
        ]);

        // Login attempt

        if(! Auth::attempt($attributes)){
            throw ValidationException::withMessages([
                'email' => 'Sorry, those credentials do not match..!'
            ]);

            return back()->onlyInput('email');
        }


        // Session regenerate
        request()->session()->regenerate();

        // redirect

        return redirect()->intended('/')->with('success', 'Logged in Successfully..!');

    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy()
    {
        Auth::logout();

        return redirect('/')->with('info', 'Logged out Successfully..!');
    }
}
