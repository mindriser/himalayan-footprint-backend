<?php

namespace App\Filament\Resources\Variants\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class VariantsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('package.title')
                    ->label('Package')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('variation_name')
                    ->searchable(),
                TextColumn::make('old_single_price')
                    ->money()
                    ->sortable(),
                TextColumn::make('new_single_price')
                    ->money()
                    ->sortable(),
                TextColumn::make('old_group_price')
                    ->money()
                    ->sortable(),
                TextColumn::make('new_group_price')
                    ->money()
                    ->sortable(),

                TextColumn::make('min_group_size')
                    ->numeric()
                    ->sortable(),
                IconColumn::make('is_default')
                    ->boolean(),
                // default false
                IconColumn::make('is_active')
                    ->boolean(),
                // default false
                // can we change this to switch ? draft and publish

                // TextColumn::make('created_at')
                //     ->dateTime()
                //     ->sortable()
                //     ->toggleable(isToggledHiddenByDefault: true),
                // TextColumn::make('updated_at')
                //     ->dateTime()
                //     ->sortable()
                //     ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
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
