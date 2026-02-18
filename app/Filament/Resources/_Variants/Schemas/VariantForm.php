<?php

namespace App\Filament\Resources\Variants\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class VariantForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('package_id')
                    ->label('Package')
                    ->relationship('package', 'title')
                    ->searchable()
                    ->preload()
                    ->required(),

                TextInput::make('variation_name')
                    ->required(),

                TextInput::make('old_single_price')
                    ->label('Old Single Person Price')
                    ->numeric()
                    ->step(0.01)
                    ->rule('decimal:0,2')
                    ->afterStateUpdated(
                        fn($state, $set) =>
                        $set('old_single_price', number_format((float) $state, 2, '.', ''))
                    )
                    ->prefix('$'),
                TextInput::make('new_single_price')
                    ->label('New Single Person Price')

                    ->numeric()
                    ->prefix('$'),
                TextInput::make('old_group_price')
                    ->numeric()
                    ->prefix('$'),
                TextInput::make('new_group_price')
                    ->numeric()
                    ->prefix('$'),
                TextInput::make('min_group_size')
                    ->placeholder('e.g. 12')
                    ->numeric(),
                Section::make('Content')
                    ->collapsible()
                    ->columnSpanFull()
                    ->columns(2)
                    ->components([
                        Textarea::make('short_description')
                            ->columnSpanFull()
                            ->rows(3),
                        RichEditor::make('description')
                            ->columnSpanFull()
                            ->extraAttributes(['style' => 'min-height: 600px;']),
                    ]),


                Toggle::make('is_default')
                    ->required(),

                Toggle::make('is_active')
                    ->required(),
                Section::make('Images')
                    ->collapsible()
                    ->columnSpanFull()
                    ->components([
                        Repeater::make('images') // This will map to variant_images relationship
                            ->relationship('images') // Make sure the Variant model has a `images()` relation
                            ->schema([
                                FileUpload::make('image_url')
                                    // ->disk('public')  // Use the public disk
                                    ->label('Image')
                                    ->image()
                                    // ->visibility('public')
                                    ->required(),
                                Toggle::make('is_primary')
                                    ->label('Primary Image'),
                            ])
                            ->columns(2)
                            ->addActionLabel('Add Image'),
                        /*
                            Filament\Forms\Components\Repeater::getRelationship(): Return value must be of type Illuminate\Database\Eloquent\Relations\HasOneOrMany|Illuminate\Database\Eloquent\Relations\BelongsToMany|null, Illuminate\Database\Eloquent\Relations\BelongsTo returned */
                    ]),
            ]);
    }
}
