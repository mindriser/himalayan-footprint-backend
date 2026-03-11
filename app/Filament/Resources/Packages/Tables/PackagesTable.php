<?php

namespace App\Filament\Resources\Packages\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables;
use Filament\Tables\Columns\BooleanColumn;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Table;

class PackagesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')
                    ->searchable()
                    ->sortable(),

                // TextColumn::make('category.name')
                //     ->label('Category')
                //     ->sortable()
                //     ->searchable(),

                TextColumn::make('destination')
                    ->sortable()
                    ->toggleable(),

                TextColumn::make('duration_label')
                    ->label('Duration')
                    ->toggleable(),

                TextColumn::make('difficulty')
                    ->badge()
                    ->colors([
                        'success' => 'easy',
                        'warning' => 'moderate',
                        'danger'  => 'hard',
                    ])
                    ->sortable(),

                IconColumn::make('is_featured')  // not being shown
                    ->boolean()  // ensures check/cross icons are displayed
                    ->label('Featured'),

                IconColumn::make('is_active')
                    ->boolean()  // ensures check/cross icons are displayed
                    ->label('Active'),

                TextColumn::make('created_at')
                    ->dateTime('d M Y')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('difficulty')
                    ->options([
                        'easy' => 'Easy',
                        'moderate' => 'Moderate',
                        'hard' => 'Hard',
                    ]),

                Tables\Filters\TernaryFilter::make('is_active')
                    ->label('Active'),

                Tables\Filters\TernaryFilter::make('is_featured')
                    ->label('Featured'),
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
