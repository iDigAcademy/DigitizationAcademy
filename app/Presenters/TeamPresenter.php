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

use App\Models\Team;
use Illuminate\Support\Facades\Storage;

/**
 * Presenter class for Team model that handles presentation logic
 * related to team data formatting and display.
 */
readonly class TeamPresenter
{
    /**
     * Create a new TeamPresenter instance.
     *
     * @param  Team  $team  The team model instance to be presented
     */
    public function __construct(
        private Team $team
    ) {}

    /**
     * Get the team's image URL.
     * Returns the team's custom image URL if it exists,
     * otherwise returns the default team image URL.
     *
     * @return string The URL to the team's image
     */
    public function teamImage(): string
    {
        return isset($this->team->image) && Storage::disk('public')->exists($this->team->image) ? Storage::url($this->team->image) : Storage::url('default_image/team_default.jpg');
    }
}
