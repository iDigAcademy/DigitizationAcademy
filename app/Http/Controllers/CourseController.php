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

use App\Models\Course;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Support\Carbon;

class CourseController extends Controller
{
    /**
     * Show courses page.
     */
    public function index(string $slug): Renderable
    {
        $course = Course::slug($slug)->active()->with('assets')->with([
            'events' => function ($query) {
                $query->whereDate('start_date', '>=', Carbon::now()->format('Y-m-d'))->orderBy('start_date', 'asc');
            },
        ])->firstOrFail();
        $buttonDate = isset($course->events)
            && $course->events->isNotEmpty()
            && Carbon::now()->between($course->events->first()->form_start_date,
                $course->events->first()->form_end_date);

        return view('course', compact('course', 'buttonDate'));
    }
}
