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

namespace App\Services;

use App\Models\Event;
use Illuminate\Database\Eloquent\Collection;

/**
 * Service class for handling Event-related business logic and queries.
 * Provides methods for retrieving and managing course events.
 */
class EventService
{
    /**
     * Retrieves a collection of course events based on the specified type.
     * Only includes events that are associated with active courses.
     *
     * @param  string  $type  The type of events to retrieve ('upcoming', 'past', or 'all')
     * @return \Illuminate\Database\Eloquent\Collection Collection of Event models
     */
    public function showCatalogCourses(string $type): Collection
    {
        $query = Event::whereHas('course', function ($q) {
            $q->active();
        })->with('course');

        // Filter based on type
        match ($type) {
            'past' => $query->where('start_date', '<', now())->orderBy('start_date', 'desc'),
            'all' => $query->orderBy('start_date', 'desc'),
            default => $query->where('start_date', '>', now())->orderBy('start_date', 'asc'),
        };

        return $query->get();
    }
}
