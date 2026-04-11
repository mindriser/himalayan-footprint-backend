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
                    ->label("page | slug")
                    ->hint('This is the URL slug for the page. eg: if frontned have /contact then slug is contact  if /about-us/team then slug is about-us/team')
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
