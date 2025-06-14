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

use App\Services\CourseService;
use Illuminate\Contracts\Support\Renderable;

/**
 * Controller responsible for handling course-related HTTP requests.
 * Manages the display of course information to users.
 */
class CourseController extends Controller
{
    /**
     * Create a new CourseController instance.
     *
     * @param  CourseService  $courseService  Service class handling course business logic
     */
    public function __construct(private readonly CourseService $courseService) {}

    /**
     * Show courses page.
     *
     * @param  string  $slug  The unique identifier for the course
     * @return Renderable Returns a view with the course details
     */
    public function __invoke(string $slug): Renderable
    {
        $course = $this->courseService->getCourseForDisplay($slug);

        return view('course', compact('course'));

    }
}
