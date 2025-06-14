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

namespace App\View\Composers;
use App\Services\CourseService;
use Illuminate\View\View;

readonly class CourseComposer
{
    public function __construct(
        private CourseService $courseService
    ) {}

    /**
     * Bind data to the view
     */
    public function compose(View $view): void
    {
        $course = $view->getData()['course'];

        $view->with([
            'nextOffering' => $this->courseService->generateNextOffering($course),
            'buttonDate' => $this->courseService->shouldShowRegistrationButton($course),
            'hasEvents' => $course->events && $course->events->isNotEmpty(),
            'showOfferingsPane' => $this->courseService->shouldShowOfferingsPane($course),
            'offeringsActive' => $this->courseService->isOfferingsTabActive($course),
        ]);
    }


}