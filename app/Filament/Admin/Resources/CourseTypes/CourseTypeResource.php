<?php

namespace App\Filament\Admin\Resources\CourseTypes;

use App\Filament\Admin\Resources\CourseTypes\Pages\CreateCourseType;
use App\Filament\Admin\Resources\CourseTypes\Pages\EditCourseType;
use App\Filament\Admin\Resources\CourseTypes\Pages\ListCourseTypes;
use App\Filament\Admin\Resources\CourseTypes\Schemas\CourseTypeForm;
use App\Filament\Admin\Resources\CourseTypes\Tables\CourseTypesTable;
use App\Models\CourseType;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class CourseTypeResource extends Resource
{
    protected static ?string $model = CourseType::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'type';

    public static function form(Schema $schema): Schema
    {
        return CourseTypeForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return CourseTypesTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            \App\Filament\Admin\Resources\CourseTypes\RelationManagers\CoursesRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListCourseTypes::route('/'),
            'create' => CreateCourseType::route('/create'),
            'edit' => EditCourseType::route('/{record}/edit'),
        ];
    }
}
