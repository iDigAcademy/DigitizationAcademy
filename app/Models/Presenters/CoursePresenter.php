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

namespace App\Models\Presenters;

use Illuminate\Support\Facades\Storage;

class CoursePresenter extends Presenter
{
    /**
     * Return the tile_image url if present or default image.
     *
     * @return string The URL of the tile image from storage
     */
    public function tileImage(): string
    {
        return Storage::url($this->model->tile_image);
    }

    /**
     * Return the page_image url if present or default image.
     *
     * @return string The URL of the page image from storage
     */
    public function pageImage(): string
    {
        return Storage::url($this->model->page_image);
    }

    /**
     * Return the syllabus file url from storage.
     *
     * @return string The URL of the syllabus PDF from storage
     */
    public function syllabus(): string
    {
        return Storage::url($this->model->syllabus);
    }
}
