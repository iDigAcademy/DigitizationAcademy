<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\FormData;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;

class PageImages extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\PageImages::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'page';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id',
        'page',
        'image_name',
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
            Select::make('Page', 'page')->options([
                'about'     => 'About',
                'calendar'  => "Calendar",
                'community' => 'Community',
                'courses'   => 'Courses',
                'home'      => 'Home',
            ])->displayUsingLabels(),
            Select::make('Position', 'position')->hide()->dependsOn(
                ['page'],
                function (Select $field, NovaRequest $request, FormData $formData) {
                    if ($formData->page === 'home') {
                        $field->show();
                    } else {
                        $field->hide();
                    }
                }
            )->options([
                '2'     => 'Top',
                '1'  => "Bottom",
            ])->displayUsingLabels(),
            Image::make('Image')
                ->store(function (Request $request, $model) {
                    return [
                        'image' => $request->image->store(config('config.page_image_dir'), 'public'),
                        'image_name' => $request->image->getClientOriginalName(),
                        'image_size' => $request->image->getSize(),
                    ];
                })->maxWidth(100),
            Boolean::make('Active')
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
