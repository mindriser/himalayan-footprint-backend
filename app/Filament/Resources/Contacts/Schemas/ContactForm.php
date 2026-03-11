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

                Select::make('type')
                    ->label('Contact Type')
                    ->options([
                        'info' => 'Info',
                        'social' => 'Social ',
                    ])
                    ->required(),

                Select::make('service')
                    ->label('Service')
                    ->options([
                        'phone' => 'Phone',
                        'email' => 'Email',
                        'office' => 'Office',
                        'whatsapp' => 'WhatsApp',
                        'viber' => 'Viber',
                        'google_map_embed_link' => 'Google Embed Link',
                        'google_map_link' => 'Google Map Link',
                        //
                        //
                        'facebook' => 'Facebook',
                        'instagram' => 'Instagram',
                        'trip_advisor' => 'Trip Advisor',
                        'youtube' => 'Youtube',
                        'tiktok' => 'Tiktok',
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
                    ->maxLength(1000),

                TextInput::make('sub')
                    ->label('Sub Text')
                    ->placeholder('example: Primary Number , we usually reply within 1 hour ')
                    ->maxLength(50),

                TextInput::make('label')
                    ->label('contact Label')
                    ->placeholder('example: Primary phone, Alternative phone')
                    ->maxLength(100),

                TextInput::make('order')
                    ->label('Display Order')
                    ->placeholder('Default is 5')
                    ->numeric() // ensures only numbers
                    ->default(5) // default value
                    ->minValue(1) // optional: minimum allowed value
                    ->maxValue(100), // optional: maximum allowed value
                // ->required(),
                TextInput::make('href')
                    ->label('Redirect To')
                    ->placeholder('example: tel+977 9840425XXX ')
                    ->maxLength(1000),
            ]);
    }
}
