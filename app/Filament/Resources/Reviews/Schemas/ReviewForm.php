<?php

namespace App\Filament\Resources\Reviews\Schemas;

use App\Models\Package;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class ReviewForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                Select::make('package_id')
                    ->label('Package')
                    ->required()
                    ->preload()
                    ->searchable()
                    ->options(function () {
                        return Package::active()->get()
                            ->mapWithKeys(function ($el) {
                                return [$el->id => $el->title];
                            })
                            ->toArray();
                    })
                    ->placeholder('Select a package'),
                // TextInput::make('package_id')
                //     ->required()
                //     ->numeric(),
                TextInput::make('reviewer_name')
                    ->required(),
                FileUpload::make('reviewer_image')
                    ->image(),
                TextInput::make('title'),
                Textarea::make('description')
                    ->columnSpanFull(),
                TextInput::make('rating')
                    ->required()
                    ->numeric()
                    ->default(5)
                    ->minValue(1)
                    ->maxValue(5),
                DatePicker::make('review_date'),
            ]);
    }
}
