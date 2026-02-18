<?php

namespace App\Filament\Resources\Reviews\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ReviewsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                // TextColumn::make('package_id')
                //     ->numeric()
                //     ->sortable(),
                    TextColumn::make('package.title') // Access the related package's title
    ->label('Package')
    ->sortable()
    ->searchable(),
                    // Select::make('package_id')
                    // ->label('Package')
                    // ->required()
                    // ->preload()
                    // ->searchable()
                    // ->options(function () {
                    //     return Package::active()->get()
                    //         ->mapWithKeys(function ($el) {
                    //             return [$el->id => $el->title];
                    //         })
                    //         ->toArray();
                    // })
                    // ->placeholder('Select a package'),
                TextColumn::make('reviewer_name')
                    ->searchable(),
                ImageColumn::make('reviewer_image'),
                TextColumn::make('title')
                    ->searchable(),
                TextColumn::make('rating')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('review_date')
                    ->date()
                    ->sortable(),
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
