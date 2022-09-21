<?php
/*
 * Copyright (c) 2022. Digitization Academy
 * idigacademy@gmail.com
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <https://www.gnu.org/licenses/>.
 */

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
