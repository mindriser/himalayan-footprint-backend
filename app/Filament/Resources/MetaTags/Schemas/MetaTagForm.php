<?php

namespace App\Filament\Resources\MetaTags\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class MetaTagForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('slug')
                    ->required(),
                TextInput::make('title')
                ->label("Page Title"),
                TextInput::make('meta_title'),
                Textarea::make('meta_description')
                    ->columnSpanFull(),
                TextInput::make('meta_keywords')
                    ->columnSpanFull(),
                FileUpload::make('meta_image')
                    ->maxSize(1024)
                    ->hint('1MB max file size allowed.')
                    ->image(),
            ]);
    }
}
