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

namespace App\Filament\Admin\Widgets;

use App\Models\Event;
use Filament\Actions as Actions;
use Filament\Actions\Concerns\InteractsWithActions;
use Filament\Actions\Contracts\HasActions;
use Filament\Forms;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class UpcomingEventsWidget extends BaseWidget implements HasActions, HasForms
{
    use InteractsWithActions;
    use InteractsWithForms;

    protected static ?string $heading = 'Upcoming Events';

    protected int|string|array $columnSpan = 'full';

    public function table(Table $table): Table
    {
        return $table
            ->query(
                Event::query()
                    ->with('course')
                    ->where('start_date', '>=', now())
                    ->orderBy('start_date', 'asc')
                    ->limit(10)
            )
            ->columns([
                TextColumn::make('course.title')
                    ->label('Course Title')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('start_date')
                    ->label('Start Date')
                    ->date('M j, Y')
                    ->sortable(),
                TextColumn::make('end_date')
                    ->label('End Date')
                    ->date('M j, Y')
                    ->sortable(),
                TextColumn::make('schedule')
                    ->label('Schedule')
                    ->wrap(),
            ])
            ->recordActions([
                Actions\ViewAction::make('view')
                    ->label('View')
                    ->modalHeading(fn (): string => 'Event Details')
                    ->schema([
                        Forms\Components\TextInput::make('course_title')
                            ->label('Course Title')
                            ->disabled(),
                        Forms\Components\TextInput::make('start_date')
                            ->label('Start Date')
                            ->disabled()
                            ->formatStateUsing(function ($state) {
                                return method_exists($state, 'format') ? $state->format('M j, Y') : ($state ? (string) $state : '—');
                            }),
                        Forms\Components\TextInput::make('end_date')
                            ->label('End Date')
                            ->disabled()
                            ->formatStateUsing(function ($state) {
                                return method_exists($state, 'format') ? $state->format('M j, Y') : ($state ? (string) $state : '—');
                            }),
                        Forms\Components\Textarea::make('schedule')
                            ->label('Schedule')
                            ->rows(2)
                            ->disabled(),
                        Forms\Components\TextInput::make('form_start_date')
                            ->label('Form Start Date')
                            ->disabled()
                            ->formatStateUsing(function ($state) {
                                return method_exists($state, 'format') ? $state->format('M j, Y') : ($state ? (string) $state : '—');
                            }),
                        Forms\Components\TextInput::make('form_end_date')
                            ->label('Form End Date')
                            ->disabled()
                            ->formatStateUsing(function ($state) {
                                return method_exists($state, 'format') ? $state->format('M j, Y') : ($state ? (string) $state : '—');
                            }),
                        Forms\Components\TextInput::make('form_link')
                            ->label('Form Link')
                            ->disabled(),
                    ])
                    ->mutateRecordDataUsing(function (array $data, Event $record): array {
                        $data['course_title'] = $record->course?->title ?? '—';

                        return $data;
                    }),
            ])
            ->recordAction('view')
            ->paginated(false);
    }
}
