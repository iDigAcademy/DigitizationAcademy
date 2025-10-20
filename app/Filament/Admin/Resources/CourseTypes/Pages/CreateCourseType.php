<?php

namespace App\Filament\Admin\Resources\CourseTypes\Pages;

use App\Filament\Admin\Resources\CourseTypes\CourseTypeResource;
use Filament\Resources\Pages\CreateRecord;

class CreateCourseType extends CreateRecord
{
    protected static string $resource = CourseTypeResource::class;
}
