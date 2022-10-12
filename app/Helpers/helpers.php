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

use Illuminate\Support\Carbon;

if (! function_exists('vite_asset')) {

    function vite_asset($path): string
    {
        return \Illuminate\Support\Facades\Vite::asset($path);
    }
}

if (! function_exists('date_day_string')) {
    function date_day_string(Carbon $date): string
    {
        return $date->toFormattedDayDateString();
    }
}

if (! function_exists('date_timezone')) {
    function date_timezone_string(Carbon $date): string
    {
        $timezone = isset(Auth::user()->timezone) ? Auth::user()->timezone : Session::get('timezone');

        return $date->tz($timezone)->toFormattedDayDateString();
    }
}
