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

use App\Models\PageImages;
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
        $topResult = PageImages::pageImage('home', 2)->inRandomOrder()->first();
        return $topResult === null ?
            Storage::url('page_image/banner-shape-1.png') :
            Storage::url($topResult->image);
    }

    /**
     * Get top image for home page.
     *
     * @return string
     */
    public function getHomeBottomImage(): string
    {
        $topResult = PageImages::pageImage('home', 1)->inRandomOrder()->first();
        return $topResult === null ?
            Storage::url('page_image/banner-shape-2.png') :
            Storage::url($topResult->image);
    }

    /**
     * Get top image for home page.
     *
     * @return string
     */
    public function getCourseImage(): string
    {
        $topResult = PageImages::pageImage('courses')->first();
        return $topResult === null ?
            Storage::url('page_image/banner-butterfly.png') :
            Storage::url($topResult->image);
    }

    /**
     * Get top image for calendar page.
     *
     * @return string
     */
    public function getCalendarImage(): string
    {
        $topResult = PageImages::pageImage('calendar')->first();
        return $topResult === null ?
            Storage::url('page_image/banner-lichen.png') :
            Storage::url($topResult->image);
    }

    /**
     * Get top image for community page.
     *
     * @return string
     */
    public function getCommunityImage(): string
    {
        $topResult = PageImages::pageImage('community')->first();
        return $topResult === null ?
            Storage::url('page_image/banner-fossil.png') :
            Storage::url($topResult->image);
    }

    /**
     * Get top image for about page.
     *
     * @return string
     */
    public function getAboutImage(): string
    {
        $topResult = PageImages::pageImage('about')->first();
        return $topResult === null ?
            Storage::url('page_image/banner-lichen.png') :
            Storage::url($topResult->image);
    }
}
