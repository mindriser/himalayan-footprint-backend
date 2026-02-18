<?php

namespace App\Filament\Resources\Enquiries\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class EnquiryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('package_id')
                    ->relationship('package', 'title')
                    ->required()
                    ->preload()
                    ->searchable(),
                // TextInput::make('package_id')
                //     ->numeric(),
                TextInput::make('tour_name')
                    ->required(),
                TextInput::make('name')
                    ->required(),
                TextInput::make('email')
                    ->label('Email address')
                    ->email()
                    ->required(),
                TextInput::make('phone')
                    ->tel(),
                TextInput::make('country'),
                Textarea::make('message')
                    ->columnSpanFull(),
                TextInput::make('num_travelers')
                    ->numeric(),
            ]);
    }
}
