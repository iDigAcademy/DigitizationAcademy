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
use Laracasts\Presenter\Presenter;

class TeamPresenter extends Presenter
{
    /**
     * @return string
     */
    public function teamImage(): string
    {
        return isset($this->image) && Storage::disk('public')->exists($this->image) ?
            Storage::url($this->image) :
            Storage::url('default_image/team_default.jpg');
    }
}
