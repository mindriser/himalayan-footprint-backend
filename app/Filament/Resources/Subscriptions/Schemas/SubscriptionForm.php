<?php

namespace App\Filament\Resources\Subscriptions\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class SubscriptionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('email')
                    ->label('Email address')
                    ->email()
                    ->required(),
                TextInput::make('name'),
                TextInput::make('status')
                    ->required()
                    ->default('active'),
                TextInput::make('source'),
                DateTimePicker::make('subscribed_at')
                    ->required(),
                DateTimePicker::make('unsubscribed_at'),
            ]);
    }
}
