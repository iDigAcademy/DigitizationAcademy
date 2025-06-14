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

use Alexwenzel\DependencyContainer\DependencyContainer;
use Alexwenzel\DependencyContainer\HasDependencies;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Laravel\Nova\Fields\BelongsToMany;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\File;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Http\Requests\NovaRequest;
use PixelCreation\NovaFieldSortable\Concerns\SortsIndexEntries;
use PixelCreation\NovaFieldSortable\Sortable;

class Course extends Resource
{
    use HasDependencies, SortsIndexEntries;

    /**
     * @var string
     */
    public static $defaultSortField = 'sort_order';

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
        'language',
        'active',
    ];

    /**
     * Get the fields displayed by the resource.
     *
     * @return array
     */
    public function fields(NovaRequest $request)
    {
        return [
            ID::make()->sortable(),
            Text::make('Title')->rules('required', 'string', 'min:10', 'max:70')
                ->required()
                ->sortable()
                ->help('Max 70 characters'),
            Select::make('Type')->options(['2 Hour' => '2 Hour', '12 Hour' => '12 Hour'])
                ->rules('required')
                ->required()
                ->sortable(),
            Textarea::make('Description')->rules('required', 'string', 'min:10', 'max:1000')
                ->required()
                ->help('Max 1000 characters'),
            DependencyContainer::make([
                Textarea::make('Objectives')
                    ->rules('string', 'min:10', 'max:1200', 'required_if:type,12 Hour')
                    ->help('Max 1200 characters'),
            ])->dependsOn('type', '12 Hour'),
            Select::make('Language', 'language')
                ->options(['English' => 'English', 'Spanish' => 'Spanish'])
                ->required()
                ->sortable(),
            Text::make('Led By', 'instructor')->rules('required', 'string', 'min:10', 'max:100'),
            Image::make('Tile Image')->store(function (Request $request) {
                return [
                    'tile_image' => $request->tile_image->store(config('config.course_image_dir'), 'public'),
                ];
            })->required()
                ->creationRules('image', 'mimes:jpg,jpeg,png', 'dimensions:width=101,height=550')
                ->updateRules('image', 'mimes:jpg,jpeg,png', 'dimensions:width=101,height=550')
                ->preview(function ($value, $disk) {
                    return Storage::disk($disk)->url($value);
                })
                ->prunable()
                ->hideFromIndex()
                ->help('Width 101px, Height 550px'),
            Image::make('Page Image')->store(function (Request $request) {
                return [
                    'page_image' => $request->page_image->store(config('config.course_image_dir'), 'public'),
                ];
            })->required()
                ->creationRules('image', 'mimes:jpg,jpeg,png', 'dimensions:width=336,height=555')
                ->updateRules('image', 'mimes:jpg,jpeg,png', 'dimensions:width=336,height=555')
                ->preview(function ($value, $disk) {
                    return Storage::disk($disk)->url($value);
                })
                ->prunable()->hideFromIndex()->help('Width 336px, Height 555px'),

            DependencyContainer::make([
                File::make('Syllabus')->store(function (Request $request) {
                    if ($request->hasFile('syllabus')) {
                        return [
                            'syllabus' => $request->syllabus->store(config('config.course_syllabus_dir'), 'public'),
                        ];
                    }
                    return [];
                })
                    ->deletable()
                    ->hideFromIndex()
                    ->creationRules('mimes:pdf', 'required_if:type,12 Hour')
                    ->updateRules('mimes:pdf')
                    ->help('Upload a PDF file.'),
            ])->dependsOn('type', '12 Hour'),

            DependencyContainer::make([
                Text::make('Video')->rules('required_if:type,2 Hour')->help('Enter video link for course.'),
            ])->dependsOn('type', '2 Hour'),
            Boolean::make('Active')->sortable(),
            Sortable::make('Order', 'sort_order')->onlyOnIndex(),
            BelongsToMany::make('Assets', 'assets', \App\Nova\Asset::class),
        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @return array
     */
    public function cards(NovaRequest $request)
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @return array
     */
    public function filters(NovaRequest $request)
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @return array
     */
    public function lenses(NovaRequest $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @return array
     */
    public function actions(NovaRequest $request)
    {
        return [];
    }
}
