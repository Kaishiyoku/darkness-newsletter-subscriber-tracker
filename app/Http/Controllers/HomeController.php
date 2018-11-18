<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    /**
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->check()) {
            return $this->dashboard();
        }

        return view('auth.login');
    }

    public function dashboard()
    {
        return view('home.dashboard');
    }
}
