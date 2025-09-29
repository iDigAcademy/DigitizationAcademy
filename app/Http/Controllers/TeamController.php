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

use App\Models\Team;
use Illuminate\Contracts\Support\Renderable;

/**
 * Controller for managing team-related functionality.
 * Handles the display of current and former team members.
 *
 * @author Digitization Academy <idigacademy@gmail.com>
 */
class TeamController extends Controller
{
    /**
     * Display the about page with team information.
     * Retrieves and splits team members into current and former teams.
     *
     * @return Renderable View containing team information and top image
     */
    public function __invoke(): Renderable
    {
        $teams = Team::orderBy('order')->get();

        /** @var \Illuminate\Database\Eloquent\Collection $teams */
        [$currentTeam, $formerTeam] = $teams->partition(fn (Team $team) => $team->current === 1);

        return view('team', compact('currentTeam', 'formerTeam'));
    }
}
