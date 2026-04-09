<?php

namespace App\Filament\Resources\Banners\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class BannerForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title'),
                TextInput::make('label'),
                Textarea::make('description')
                    ->maxLength(255)
                    ->columnSpanFull(),
                //  add size validation: 2mb max
                FileUpload::make('image_url')
                    // ->disk("public")
                    // ->visibility('public')
                    ->image()
                    ->hint("Max 1MB file size")
                    ->maxSize(1024)
                    ->required(),
                TextInput::make('redirect_url'),
                // ->url(),
                TextInput::make('redirect_label'),
            ]);
    }
}
