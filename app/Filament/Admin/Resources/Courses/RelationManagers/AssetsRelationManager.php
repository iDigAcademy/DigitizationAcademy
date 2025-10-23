<?php
/*
 * Copyright (C) 2022 - 2025, Digitization Academy
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

namespace App\Filament\Admin\Resources\Courses\RelationManagers;

use App\Models\Asset;
use Filament\Actions\AttachAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\DetachAction;
use Filament\Actions\DetachBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class AssetsRelationManager extends RelationManager
{
    protected static string $relationship = 'assets';

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                TextInput::make('url')
                    ->url()
                    ->maxLength(255),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('name')
            ->columns([
                TextColumn::make('name')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('url')
                    ->label('URL')
                    ->url(fn (Asset $record): ?string => $record->url, true)
                    ->openUrlInNewTab(),
            ])
            ->headerActions([
                AttachAction::make()
                    ->recordSelect(
                        fn (Select $select) => $select
                            ->preload()
                            ->searchable()
                            ->getSearchResultsUsing(function (string $search): array {
                                return Asset::query()
                                    ->where('name', 'LIKE', "%{$search}%")
                                    ->limit(50)
                                    ->pluck('name', 'id')
                                    ->all();
                            })
                            ->getOptionLabelFromRecordUsing(fn (Asset $record): string => $record->name)
                            ->createOptionForm([
                                TextInput::make('name')
                                    ->required()
                                    ->maxLength(255),
                                TextInput::make('url')
                                    ->required()
                                    ->url()
                                    ->maxLength(255),
                            ])
                            ->createOptionUsing(function (array $data) {
                                $asset = Asset::create($data);
                                return $asset->getKey();
                            })
                    ),
            ])
            ->recordActions([
                DetachAction::make(),
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                    DetachBulkAction::make(),
                ]),
            ]);
    }
}