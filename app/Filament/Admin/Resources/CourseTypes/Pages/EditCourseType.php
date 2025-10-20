<?php

namespace App\Filament\Admin\Resources\CourseTypes\Pages;

use App\Filament\Admin\Resources\CourseTypes\CourseTypeResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditCourseType extends EditRecord
{
    protected static string $resource = CourseTypeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
