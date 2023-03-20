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
use App\Models\Services\PageService;
use Illuminate\Contracts\Support\Renderable;

class CourseController extends Controller
{
    /**
     * @var \App\Models\Services\PageService
     */
    private PageService $pageService;

    /**
     * @param \App\Models\Services\PageService $pageService
     */
    public function __construct(PageService $pageService)
    {

        $this->pageService = $pageService;
    }

    /**
     * Show courses page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(): Renderable
    {
        $topImage = $this->pageService->getCourseImage();
        $courses = Course::active()->get()->sortBy('start_date');

        return view('courses', compact('topImage', 'courses'));
    }
}
