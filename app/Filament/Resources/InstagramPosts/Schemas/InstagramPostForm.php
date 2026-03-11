<?php

namespace App\Filament\Resources\InstagramPosts\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class InstagramPostForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                // TextInput::make('photo_url')
                //     ->url()
                //     ->required(),
                FileUpload::make('photo_url')
                    ->required()
                    ->image(),
                TextInput::make('instagram_link')
                    ->url()
                    ->required(), // should be valid url
                Textarea::make('caption')
                    ->required()
                    ->columnSpanFull(),
                Textarea::make('location')
                    ->columnSpanFull(),
                TextInput::make('likes_count')
                    ->required()
                    ->numeric()
                    ->default(150),
                TextInput::make('order')
                    ->required()
                    ->numeric()
                    ->default(10),
            ]);
    }
}
