<?php

namespace App\Filament\Resources\Contacts\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class ContactForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                // TextInput::make('type')
                //     ->label('Contact Type')
                //     ->placeholder('example: phone, whatsapp, email, viber')
                //     ->required()
                //     ->maxLength(100), // lets donot let them add directly, lets first show option and only when type not in option, lets them
                // add new fiels

                // Select::make('type')
                //     ->label('Contact Type')
                //     ->options([
                //         'phone' => 'Phone',
                //         'email' => 'Email',
                //         'whatsapp' => 'WhatsApp',
                //         'viber' => 'Viber',
                //         'facebook' => 'Facebook',
                //     ])
                //     ->searchable()
                //     ->required()

                //     // allow adding new type ONLY if not in list
                //     ->createOptionForm([
                //         TextInput::make('type')
                //             ->label('New Contact Type')
                //             ->required()
                //             ->maxLength(100),
                //     ])

                //     // save the created option value
                //     ->createOptionUsing(function (array $data): string {
                //         return $data['type'];
                //     }),

                Select::make('type')
                    ->label('Contact Type')
                    ->options([
                        'phone' => 'Phone',
                        'email' => 'Email',
                        'whatsapp' => 'WhatsApp',
                        'viber' => 'Viber',
                        'facebook' => 'Facebook',
                    ])
                    ->searchable()
                    ->required()

                    // allow creating new option
                    ->createOptionForm([
                        TextInput::make('type')
                            ->label('New Contact Type')
                            ->required()
                            ->maxLength(100),
                    ])

                    // IMPORTANT: return value to store
                    ->createOptionUsing(function (array $data): string {
                        return $data['type'];
                    })

                    // IMPORTANT: allow displaying custom value
                    ->getOptionLabelUsing(function ($value): ?string {
                        return ucfirst($value);
                    })

                    // IMPORTANT: allow searching custom value
                    ->getSearchResultsUsing(function (string $search): array {
                        return [
                            $search => ucfirst($search),
                        ];
                    }),

                TextInput::make('value')
                    ->label('Contact Value')
                    ->placeholder('example: 9813948455 or abc@gmail.com or https://facebook.com/page')
                    ->required()
                    ->maxLength(500),
            ]);
    }
}
