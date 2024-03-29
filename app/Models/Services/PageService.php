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

namespace App\Models\Services;

use App\Models\Course;
use App\Models\PageImage;
use Illuminate\Support\Facades\Storage;

class PageService
{
    /**
     * Get top image for home page.
     *
     * @return string
     */
    public function getHomeTopImage(): string
    {
        $topResult = PageImage::page('home')->position(2)->active()->first();
        return $topResult === null ?
            Storage::url('default_image/banner-shape-1.png') :
            Storage::url($topResult->image);
    }

    /**
     * Get top image for home page.
     *
     * @return string
     */
    public function getHomeBottomImage(): string
    {
        $topResult = PageImage::page('home')->position(1)->active()->first();
        return $topResult === null ?
            Storage::url('default_image/banner-shape-2.png') :
            Storage::url($topResult->image);
    }

    /**
     * Get top image for home page.
     *
     * @return string
     */
    public function getCourseImage(): string
    {
        $topResult = PageImage::page('courses')->active()->first();
        return $topResult === null ?
            Storage::url('default_image/banner-butterfly.png') :
            Storage::url($topResult->image);
    }

    /**
     * Get top image for calendar page.
     *
     * @return string
     */
    public function getCalendarImage(): string
    {
        $topResult = PageImage::page('calendar')->active()->first();
        return $topResult === null ?
            Storage::url('default_image/banner-lichen.png') :
            Storage::url($topResult->image);
    }

    /**
     * Get top image for community page.
     *
     * @return string
     */
    public function getCommunityImage(): string
    {
        $topResult = PageImage::page('community')->active()->first();
        return $topResult === null ?
            Storage::url('default_image/banner-fossil.png') :
            Storage::url($topResult->image);
    }

    /**
     * Get top image for about page.
     *
     * @return string
     */
    public function getAboutImage(): string
    {
        $topResult = PageImage::page('about')->active()->first();
        return $topResult === null ?
            Storage::url('default_image/banner-lichen.png') :
            Storage::url($topResult->image);
    }

    /**
     * Get course for home page.
     *
     * @return mixed
     */
    public function getCourse(): mixed
    {
        return Course::active()->home()->first();
    }
}
