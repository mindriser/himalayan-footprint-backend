<?php

namespace App\Filament\Resources\Categories\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;


class CategoryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required()
                    ->live(onBlur: true)
                    ->unique(ignoreRecord: true)
                    ->afterStateUpdated(function ($state, callable $set, $record) {
                        if (!$record) {
                            $set('slug', Str::slug($state));
                        }
                    }),
                TextInput::make('slug')
                    ->required()
                    ->unique(ignoreRecord: true)
                    ->helperText('Auto-generated from title. Use lowercase letters and hyphens only. Spaces not allowed !')
                    ->placeholder('e.g. langtang-valley-trek')
                    ->regex('/^[a-z0-9]+(?:-[a-z0-9]+)*$/'),

                Toggle::make('show_in_navbar') // <-- added
                    ->label('Show in Navbar')
                    ->helperText('Toggle if this category should appear in the navbar.')
                    ->default(false),

                TextInput::make('navbar_order')
                    ->label('Navbar Order')
                    ->numeric()
                    ->minValue(1)
                    ->maxValue(255)
                    // ->visible(fn(callable $get) => $get('show_in_navbar'))
                    ->nullable(),
            ]);
    }
}
