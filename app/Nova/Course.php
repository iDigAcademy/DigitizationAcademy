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

namespace App\Nova;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\Date;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Fields\URL;
use Laravel\Nova\Http\Requests\NovaRequest;

class Course extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\Course::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'id';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id',
        'title',
        'objectives',
        'active',
        'home_page',
        'start_date',
        'end_date',
    ];

    /**
     * Get the fields displayed by the resource.
     *
     * @param \Laravel\Nova\Http\Requests\NovaRequest $request
     * @return array
     */
    public function fields(NovaRequest $request)
    {
        return [
            ID::make()->sortable(),
            Text::make('Title')->rules('required', 'string', 'min:10', 'max:70')->help('Max 70 characters'),
            Textarea::make('Objectives')->rules('required', 'string', 'min:10', 'max:810')->help('Max 810 characters'),
            Select::make('Language', 'language')->options(['English' => 'English', 'Spanish' => 'Spanish']),
            Image::make('Front Image')->store(function (Request $request) {
                    return [
                        'front_image'      => $request->front_image->store(config('config.course_image_dir'), 'public'),
                        'front_image_name' => $request->front_image->getClientOriginalName(),
                        'front_image_size' => $request->front_image->getSize(),
                    ];
                })->maxWidth(100)
                ->creationRules('image', 'mimes:jpg,jpeg,png', 'dimensions:min_width=468,min_height=353')
                ->updateRules('image', 'mimes:jpg,jpeg,png', 'dimensions:min_width=468,min_height=353')
                ->preview(function ($value, $disk) {
                    return $value
                        ? Storage::disk($disk)->url($value)
                        : Storage::disk($disk)->url('default_image/course_default_front.png');
                })
                ->prunable()->hideFromIndex()->help('Min width 468px, Min height 353px'),
            Image::make('Back Image')->store(function (Request $request) {
                    return [
                        'back_image'      => $request->back_image->store(config('config.course_image_dir'), 'public'),
                        'back_image_name' => $request->back_image->getClientOriginalName(),
                        'back_image_size' => $request->back_image->getSize(),
                    ];
                })->maxWidth(100)
                ->creationRules('image', 'mimes:jpg,jpeg,png', 'dimensions:min_width=468,min_height=100')
                ->updateRules('image', 'mimes:jpg,jpeg,png', 'dimensions:min_width=468,min_height=100')
                ->preview(function ($value, $disk) {
                    return $value
                        ? Storage::disk($disk)->url($value)
                        : Storage::disk($disk)->url('default_image/course_default_back.png');
                })
                ->prunable()->hideFromIndex()->help('Min width 468px, Min height 100px'),
            Date::make('Start Date')->rules('required'),
            Date::make('End Date')->rules('required'),
            Text::make('Schedule Details')->rules('required', 'string', 'max: 30')->hideFromIndex()->help('Max 30 characters'),
            URL::make('Registration URL')->rules('required', 'string', 'min:10', 'max:150')->hideFromIndex()->help('Max 150 characters'),
            Date::make('Registration Start Date')->hideFromIndex()->rules('required'),
            Date::make('Registration End Date')->hideFromIndex()->rules('required'),
            URL::make('Syllabus URL')->hideFromIndex()->rules('required', 'string', 'min:10', 'max:150')->help('Max 150 characters'),
            Boolean::make('Active'),
            Boolean::make('Home Page')
        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @param \Laravel\Nova\Http\Requests\NovaRequest $request
     * @return array
     */
    public function cards(NovaRequest $request)
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param \Laravel\Nova\Http\Requests\NovaRequest $request
     * @return array
     */
    public function filters(NovaRequest $request)
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param \Laravel\Nova\Http\Requests\NovaRequest $request
     * @return array
     */
    public function lenses(NovaRequest $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param \Laravel\Nova\Http\Requests\NovaRequest $request
     * @return array
     */
    public function actions(NovaRequest $request)
    {
        return [];
    }
}
