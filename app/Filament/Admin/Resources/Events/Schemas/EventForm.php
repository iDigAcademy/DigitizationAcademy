<?php

namespace App\Filament\Admin\Resources\Events\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class EventForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('course_id')
                    ->relationship('course', 'title')->required(),
                DatePicker::make('start_date')->required(),
                DatePicker::make('end_date')->required(),
                TextInput::make('schedule')->required(),
                DatePicker::make('form_start_date')->required(),
                DatePicker::make('form_end_date')->required(),
                TextInput::make('form_link')->required(),
            ]);
    }
}
