<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show home page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(): Renderable
    {
        return view('home');
    }

    /**
     * Show courses page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function courses(): Renderable
    {
        return view('courses');
    }

    /**
     * Show calendar page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function calendar(): Renderable
    {
        return view('calendar');
    }

    /**
     * Show community page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function community(): Renderable
    {
        return view('community');
    }

    /**
     * Show about page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function about(): Renderable
    {
        return view('about');
    }

    public function logout()
    {
        \Auth::logout();
        return redirect('/');
    }
}
