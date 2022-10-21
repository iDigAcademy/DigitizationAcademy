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
use Laravel\Nova\Fields\Email;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Fields\ID;
use PixelCreation\NovaFieldSortable\Concerns\SortsIndexEntries;
use PixelCreation\NovaFieldSortable\Sortable;

class Team extends Resource
{
    use SortsIndexEntries;

    /**
     * @var string
     */
    public static $defaultSortField = 'order';

    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\Team::class;

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
    ];

    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function fields(NovaRequest $request)
    {
        return [
            ID::make()->sortable(),
            Text::make('Name')->required(),
            Text::make('Title')->required(),
            Email::make('Email')->required(),
            Text::make('Twitter Handle')->withMeta([
                'extraAttributes' => [
                   'placeholder' => 'User name only, no @ symbol',
                ],
            ]),
            Textarea::make('About')->required(),
            Image::make('Image')
                ->store(function (Request $request, $model) {
                    return [
                        'image' => $request->image->store(config('config.team_image_dir'), 'public'),
                        'image_name' => $request->image->getClientOriginalName(),
                        'image_size' => $request->image->getSize(),
                    ];
                })->maxWidth(100)
                ->creationRules('required', 'image', 'mimes:jpg,jpeg,png', 'dimensions:min_width=410,min_height=410')
                ->updateRules(function (NovaRequest $request) {
                    $model = $request->findModelOrFail();

                    return $model->image ? [] : ['required'];
                })->preview(function ($value, $disk) {
                    return $value
                        ? Storage::disk($disk)->url($value)
                        : Storage::disk($disk)->url('default_image/team_default.jpg');
                })->prunable(),
            Sortable::make('Order')->onlyOnIndex()
        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function cards(NovaRequest $request)
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function filters(NovaRequest $request)
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function lenses(NovaRequest $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function actions(NovaRequest $request)
    {
        return [];
    }
}
