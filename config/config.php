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

return [
    'app_path'         => base_path(),
    'app_domain'      => env('APP_DOMAIN'),
    'server_user'      => env('SERVER_USER', 'ubuntu'),
    'page_image_dir'   => 'page_image',
    'course_image_dir' => 'course_image',
    'team_image_dir'   => 'team_image',
    'idigbio_event_calendar' => env('IDIGBIO_EVENT_CALENDAR'),
];
