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

namespace App\Presenters;

use App\Models\Course;
use Storage;

/**
 * Presenter class for Course model that handles presentation logic and data formatting
 */
readonly class CoursePresenter
{
    /**
     * Create a new CoursePresenter instance
     *
     * @param  Course  $course  The course model to present
     */
    public function __construct(
        private Course $course
    ) {}

    /**
     * Get the URL for the course tile image
     *
     * @return string The storage URL for the tile image
     */
    public function tileImage(): string
    {
        return Storage::url($this->course->tile_image);
    }

    /**
     * Get the URL for the course page image
     *
     * @return string The storage URL for the page image
     */
    public function pageImage(): string
    {
        return Storage::url($this->course->page_image);
    }

    /**
     * Get the URL for the course syllabus
     *
     * @return string The storage URL for the syllabus
     */
    public function syllabus(): string
    {
        return Storage::url($this->course->syllabus);
    }

    /**
     * Check if the course has a video
     *
     * @return bool True if course is 2 Hour type and has video content
     */
    public function hasVideo(): bool
    {
        return $this->course->type === '2 Hour' && ! empty($this->course->video);
    }

    /**
     * Check if the course has associated assets
     *
     * @return bool True if course has non-empty assets collection
     */
    public function hasAssets(): bool
    {
        return $this->course->assets && $this->course->assets->isNotEmpty();
    }

    /**
     * Get the appropriate registration button text based on course type
     *
     * @return string "Register" for 2 Hour courses, "Apply" for others
     */
    public function registrationButtonText(): string
    {
        return $this->course->type === '2 Hour' ? 'Register' : 'Apply';
    }

    /**
     * Get the course objectives if available, otherwise return the course description
     *
     * @return string The course objectives or description text
     */
    public function objectivesOrDescription()
    {
        return ! empty($this->course->objectives) ?
            $this->course->objectives : $this->course->description;
    }
}
