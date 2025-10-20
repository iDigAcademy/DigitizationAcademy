<?php

namespace App\Filament\Admin\Resources\CourseTypes\Pages;

use App\Filament\Admin\Resources\CourseTypes\CourseTypeResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListCourseTypes extends ListRecords
{
    protected static string $resource = CourseTypeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
