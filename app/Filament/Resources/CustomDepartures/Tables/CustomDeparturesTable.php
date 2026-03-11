<?php

namespace App\Filament\Resources\CustomDepartures\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class CustomDeparturesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('package.title')
                    ->label('Package')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('start_date')
                    ->date()
                    ->sortable(),
                TextColumn::make('end_date')
                    ->date()
                    ->sortable(),
                TextColumn::make('max_capacity')
                    ->label("Number of People")
                    ->numeric()
                    ->sortable(),

                // ── custom_departure_details fields ───────────────
                // Requires: Departure hasOne CustomDepartureDetail (or hasMany)
                TextColumn::make('customDetail.full_name')
                    ->label('Name')
                    ->searchable(),

                TextColumn::make('customDetail.email')
                    ->label('Email')
                    ->searchable()
                    ->copyable(),

                TextColumn::make('customDetail.phone')
                    ->label('Phone')
                    ->searchable()
                    ->placeholder('—'),

                TextColumn::make('customDetail.country')
                    ->label('Country')
                    ->searchable()
                    ->placeholder('—'),

                TextColumn::make('customDetail.remarks')
                    ->label('Remarks')
                    ->limit(60)
                    ->tooltip(fn($record) => $record->customDetail?->remarks)
                    ->placeholder('—')
                    ->toggleable(),

                TextColumn::make('status')
                    ->searchable(),

                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),






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
