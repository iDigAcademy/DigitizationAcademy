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
use TheHiveTeam\Presentable\Presenter;

class CoursePresenter extends Presenter
{
    /**
     * Return front image url if present or default image.
     *
     * @return string
     */
    public function front_image(): string
    {
        return isset($this->model->front_image) && Storage::disk('public')->exists($this->model->front_image) ?
            Storage::url($this->model->front_image) :
            Storage::url('default_image/course_default_front.png');
    }

    /**
     * Return back image url if present or default image.
     *
     * @return string
     */
    public function back_image(): string
    {
        return isset($this->model->back_image) && Storage::disk('public')->exists($this->model->back_image) ?
            Storage::url($this->model->back_image) :
            Storage::url('default_image/course_default_back.png');
    }
}
