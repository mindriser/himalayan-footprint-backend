<?php

namespace App\Filament\Resources\Reviews\Schemas;

use App\Models\Package;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
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
                TextInput::make('reviewer_name')
                    ->required(),
                FileUpload::make('reviewer_image')
                    ->image(),
                TextInput::make('title'),
                RichEditor::make('description')
                    ->columnSpanFull()
                    ->label('Description')
                    ->required(),
                TextInput::make('rating')
                    ->required()
                    ->numeric()
                    ->default(5)
                    ->minValue(1)
                    ->maxValue(5),
                DatePicker::make('review_date'),

                Select::make('created_by')
                    ->label('Created By')
                    ->options([
                        'admin' => 'Admin',
                        'user' => 'User',
                    ])
                    ->required()
                    ->default('admin'),

                Select::make('status')
                    ->label('Status')
                    ->options([
                        'pending'  => 'Pending',
                        'approved' => 'Approved',
                        'rejected' => 'Rejected',
                    ])
                    ->required()
                    ->default('pending'),

                Repeater::make('images')
                    ->relationship() // auto uses morphMany relationship
                    ->schema([
                        FileUpload::make('image_url')
                            ->image()
                            ->required(),
                    ])
                    ->columnSpanFull()
                    ->label('Images')
                    ->addActionLabel('Add Image')
                    ->collapsible(),
                Toggle::make('is_featured')
                    ->label('Featured Review')
                    ->default(false)
                    ->hint("will be shown in homepage")



                // each review can have multiple images as proof just like iternaries.
            ]);
    }
}
