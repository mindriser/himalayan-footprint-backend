<?php

namespace App\Filament\Resources\Departures\Schemas;

use App\Models\Package;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class DepartureForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                // Type: fixed or custom
                Select::make('type')
                    ->label('Departure Type')
                    ->options([
                        'fixed' => 'Fixed',
                        'custom' => 'Custom',
                    ])
                    ->default('fixed')
                    ->required(),

                Select::make('package_id')
                    ->label('Package')
                    ->required()
                    ->preload()
                    ->searchable()
                    ->options(function () {
                        return Package::active()->get()
                            ->mapWithKeys(function ($el) {
                                return [$el->id => $el->title];
                            })
                            ->toArray();
                    })
                    ->placeholder('Select a package'),

                // Description
                Textarea::make('description')
                    ->label('Description')
                    ->placeholder('Write something about the departure...')
                    ->columnSpanFull(),

                // Start date (cannot select past dates)
                DatePicker::make('start_date')
                    ->label('Start Date')
                    ->required()
                    ->minDate(today()),
                // The start Date field must be a date after or equal to 2026-02-07 02:26:34.
                //  donot let them choose pervious date in UI <-------------------

                // End date (cannot select before start_date)
                DatePicker::make('end_date')
                    ->label('End Date')
                    ->required()
                    ->afterOrEqual('start_date')
                    ->minDate(today()),

                // Maximum capacity
                TextInput::make('max_capacity')
                    ->label('Maximum Capacity')
                    ->required()
                    ->numeric(),

                // Current occupancy
                TextInput::make('current_occupancy')
                    ->label('Current Occupancy')
                    ->required()
                    ->numeric()
                    ->default(0),

                // Status enum
                Select::make('status')
                    ->label('Status')
                    ->options([
                        'open' => 'Open',
                        'full' => 'Full',
                        'closed' => 'Closed',
                        'guaranteed' => 'Guaranteed',
                    ])
                    ->default('open')
                    ->required(),

                // Cutoff date
                DatePicker::make('cutoff_date')
                    ->label('Cutoff Date')
                    ->minDate(now())
                    ->placeholder('Optional: last date to book this departure'),

            ]);
    }
}
