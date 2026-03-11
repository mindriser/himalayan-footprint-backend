<?php

namespace App\Filament\Resources\Itineraries\Schemas;

use App\Models\Package;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class ItineraryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                // TextInput::make('package_id')
                //     ->numeric(),
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

                TextInput::make('title'),
                // Textarea::make('description')
                //     ->required()
                //     ->columnSpanFull(),

                RichEditor::make('description')
                    ->required()
                    ->columnSpanFull()
                    ->extraAttributes([
                        'style' => 'min-height: 300px;',
                    ]),
                Textarea::make('extra_notes')
                    ->columnSpanFull(),
                TextInput::make('day_number')
                    ->numeric(),
            ]);
    }
}
