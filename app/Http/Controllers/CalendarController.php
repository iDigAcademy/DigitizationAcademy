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

/**
 * Controller for handling calendar-related functionality.
 *
 * This controller is responsible for rendering the calendar view
 * which displays course schedules and events.
 */
class CalendarController extends Controller
{
    /**
     * Handle the incoming request and render the calendar view.
     *
     * @return \Illuminate\Contracts\Support\Renderable The rendered calendar view
     */
    public function __invoke(): Renderable
    {
        return view('calendar');
    }
}
