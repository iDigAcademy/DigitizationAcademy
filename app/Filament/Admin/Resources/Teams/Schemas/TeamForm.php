<?php

namespace App\Filament\Admin\Resources\Teams\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;
use Illuminate\Validation\Rules\Dimensions;
use Illuminate\Validation\Rules\File;

class TeamForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),
                TextInput::make('title')
                    ->required(),
                TextInput::make('email')
                    ->label('Email address')
                    ->email(),
                Textarea::make('about')
                    ->required()
                    ->columnSpanFull(),
                FileUpload::make('image')
                    ->image()
                    ->directory(config('config.team_image_dir'))
                    ->rules([
                        File::image()
                            ->types(['jpeg', 'jpg', 'png'])
                            ->dimensions((new Dimensions)->maxWidth(410)->maxHeight(410)),
                    ])
                    ->disk('public'),
                TextInput::make('order')
                    ->required()
                    ->numeric(),
                Toggle::make('current')
                    ->required(),
            ]);
    }
}
