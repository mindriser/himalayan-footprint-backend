<?php

namespace App\Filament\Resources\Bookings\Tables;

use Carbon\Carbon;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class BookingsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
             
                TextColumn::make('departure.id')
                    ->label('Departure')
                    ->getStateUsing(function ($record) {
                        $departure = $record->departure;
                        if (!$departure) return '-';

                        $packageTitle = $departure->package->title ?? '';
                        $startDate = Carbon::parse($departure->start_date)->format('Y-m-d');
                        $endDate = Carbon::parse($departure->end_date)->format('Y-m-d');

                        return "{$packageTitle} : {$startDate} to {$endDate}";
                    })
                    ->sortable()
                    ->searchable(query: function ($query, $search) {
                        $query->whereHas('departure.package', fn($q) => $q->where('title', 'like', "%{$search}%"));
                    }),


                TextColumn::make('package_name')
                    ->searchable(),
                TextColumn::make('departure_start_date')
                    ->date()
                    ->sortable(),
                TextColumn::make('departure_end_date')
                    ->date()
                    ->sortable(),
                TextColumn::make('booking_reference')
                    ->searchable(),
                TextColumn::make('num_travelers')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('base_price')
                    ->money()
                    ->sortable(),
                TextColumn::make('total_price')
                    ->money()
                    ->sortable(),
                // TextColumn::make('currency')
                //     ->searchable(),
                TextColumn::make('booking_status')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('payment_status')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('booked_at')
                    ->dateTime()
                    ->sortable(),
                TextColumn::make('confirmed_at')
                    ->dateTime()
                    ->sortable(),
                TextColumn::make('cancelled_at')
                    ->dateTime()
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
