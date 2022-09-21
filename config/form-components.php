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

    /**
     * The UI framework that should be used to generate the components.
     * Can be set to:
     * - bootstrap-5
     * - bootstrap-4
     * - tailwind-2 (upcoming feature)
     */
    'ui' => 'bootstrap-5',

    /** Whether form components should use floating labels. */
    'floating_label' => true,

    /**
     * Whether form input/textarea/checkbox/radio/switch components should display their validation success.
     * Success status will be display when errors are sent to the view with no matching with the component name.
     */
    'display_validation_success' => true,

    /**
     * Whether form input/textarea/checkbox/radio/switch components should display their validation failure.
     * Fail status will be display when errors are sent to the view with a match with the component name.
     */
    'display_validation_failure' => true,

];
