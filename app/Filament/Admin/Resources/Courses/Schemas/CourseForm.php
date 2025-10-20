<?php

namespace App\Filament\Admin\Resources\Courses\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;
use Illuminate\Validation\Rules\Dimensions;
use Illuminate\Validation\Rules\File;

class CourseForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->required()
                    ->string()
                    ->minLength(10)
                    ->maxLength(70)
                    ->helperText('Max 70 characters'),

                Select::make('course_type_id')
                    ->relationship('courseType', 'type')
                    ->required()
                    ->helperText('Select the course type')
                    ->live(),

                Textarea::make('description')
                    ->required()
                    ->string()
                    ->minLength(10)
                    ->maxLength(1000)
                    ->columnSpanFull()
                    ->helperText('Max 1000 characters'),

                Textarea::make('objectives')
                    ->string()
                    ->minLength(10)
                    ->maxLength(1200)
                    ->columnSpanFull()
                    ->helperText('Max 1200 characters')
                    ->visible(function ($get): bool {
                        $courseTypeId = $get('course_type_id');
                        if (! $courseTypeId) {
                            return false;
                        }

                        $courseType = \App\Models\CourseType::find($courseTypeId);

                        return $courseType && $courseType->type === '12-hour';
                    })
                    ->required(function ($get): bool {
                        $courseTypeId = $get('course_type_id');
                        if (! $courseTypeId) {
                            return false;
                        }

                        $courseType = \App\Models\CourseType::find($courseTypeId);

                        return $courseType && $courseType->type === '12-hour';
                    }),

                Select::make('language')
                    ->options([
                        'English' => 'English',
                        'Spanish' => 'Spanish',
                    ])
                    ->required()
                    ->default('English'),

                TextInput::make('instructor')
                    ->label('Led By')
                    ->required()
                    ->string()
                    ->minLength(10)
                    ->maxLength(100),

                FileUpload::make('tile_image')
                    ->label('Tile Image')
                    ->image()
                    ->required()
                    ->acceptedFileTypes(['image/jpeg', 'image/jpg', 'image/png'])
                    ->directory(config('config.course_image_dir'))
                    ->disk('public')
                    ->helperText('Width 101px, Height 550px')
                    ->rules([
                        File::image()
                            ->types(['jpeg', 'jpg', 'png'])
                            ->dimensions((new Dimensions)->width(101)->height(550)),
                    ]),

                FileUpload::make('page_image')
                    ->label('Page Image')
                    ->image()
                    ->required()
                    ->acceptedFileTypes(['image/jpeg', 'image/jpg', 'image/png'])
                    ->directory(config('config.course_image_dir'))
                    ->disk('public')
                    ->helperText('Width 555px, Height 555px')
                    ->rules([
                        File::image()
                            ->types(['jpeg', 'jpg', 'png'])
                            ->dimensions((new Dimensions)->width(555)->height(555)),
                    ]),

                FileUpload::make('syllabus')
                    ->label('Syllabus')
                    ->acceptedFileTypes(['application/pdf'])
                    ->directory(config('config.course_syllabus_dir'))
                    ->disk('public')
                    ->helperText('Upload a PDF file')
                    ->visible(function ($get): bool {
                        $courseTypeId = $get('course_type_id');
                        if (! $courseTypeId) {
                            return false;
                        }

                        $courseType = \App\Models\CourseType::find($courseTypeId);

                        return $courseType && $courseType->type === '12-hour';
                    })
                    ->required(function ($get): bool {
                        $courseTypeId = $get('course_type_id');
                        if (! $courseTypeId) {
                            return false;
                        }

                        $courseType = \App\Models\CourseType::find($courseTypeId);

                        return $courseType && $courseType->type === '12-hour';
                    }),

                TextInput::make('video')
                    ->label('Video')
                    ->url()
                    ->helperText('Enter video link for course')
                    ->visible(function ($get): bool {
                        $courseTypeId = $get('course_type_id');
                        if (! $courseTypeId) {
                            return false;
                        }

                        $courseType = \App\Models\CourseType::find($courseTypeId);

                        return $courseType && $courseType->type === '2-hour';
                    }),

                TextInput::make('expert_panel_headline')
                    ->label('Expert Panel Headline')
                    ->required()
                    ->string()
                    ->helperText('Enter the headline of the expert panel'),

                TextInput::make('expert_panel_copy')
                    ->label('Expert Panel Copy')
                    ->required()
                    ->string()
                    ->helperText('Enter the copy of the expert panel'),

                FileUpload::make('expert_panel_image')
                    ->label('Expert Panel Image')
                    ->image()
                    ->required()
                    ->acceptedFileTypes(['image/jpeg', 'image/jpg', 'image/png'])
                    ->directory(config('config.course_image_dir'))
                    ->disk('public')
                    ->helperText('Max Width 1320px, Max Height 220px')
                    ->rules([
                        File::image()
                            ->types(['jpeg', 'jpg', 'png'])
                            ->dimensions((new Dimensions)->maxWidth(1320)->maxHeight(220)),
                    ]),

                TextInput::make('expert_panelist_copy')
                    ->label('Expert Panelist Copy')
                    ->required()
                    ->string()
                    ->helperText('Enter the copy of the expert panelist'),

                Toggle::make('active')
                    ->required()
                    ->default(true),

                TextInput::make('order')
                    ->label('Sort Order')
                    ->required()
                    ->numeric()
                    ->default(0),
            ]);
    }
}
