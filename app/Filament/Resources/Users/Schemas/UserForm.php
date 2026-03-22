<?php

namespace App\Filament\Resources\Users\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class UserForm
{
    public static function configure(Schema $schema): Schema
    {

        $roleDescriptions = [
            'admin'        => 'Full access to all sections',
            'manager' => 'All eccess except users',
            'content_writer'     => 'Blogs, Banners, Instagram Posts, Packages, Itineraries, Teams, Package Reviews.',
        ];

        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),
                TextInput::make('email')
                    ->label('Email address')
                    ->email()
                    ->required(),
                Select::make('role')
                    ->options([
                        'admin'        => 'Super Admin',
                        'manager' => 'Operations Manager',
                        'content_writer'     => 'Content Writer',
                    ])
                    ->required()
                    ->default('content_writer')
                    ->live()
                    ->hint(fn($get) => $roleDescriptions[$get('role')] ?? '')
                    ->hintColor('primary'),

                TextInput::make('password')
                    ->default(fn() => \Illuminate\Support\Str::random(12))
                    ->helperText(fn(string $operation) => $operation === 'create'
                        ? 'Auto-generated. Share this with the user manually.'
                        : 'Leave blank to keep current password. Fill to reset.')
                    ->dehydrated(fn($state) => filled($state))  // only save if filled
                    ->required(fn(string $operation) => $operation === 'create'), // required on create only

                Toggle::make('is_active')
                    ->label('Active')
                    ->default(true)
                    ->inline(false),
            ]);
    }
}
