<?php

namespace App\Filament\Resources\Packages\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Illuminate\Support\Str;

use Filament\Schemas\Schema;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Tables\Columns\TextColumn;

class PackageForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Basic Information')
                    ->columns(2)
                    ->components([
                        Select::make('category') // the enum column name
                            ->label('Category') // optional, for display
                            ->required()
                            ->options([
                                'tour' => 'Tour',
                                'trek' => 'Trek',
                            ])
                            ->default('tour')
                            ->searchable(),
                        TextInput::make('title')
                            ->required()
                            ->live(onBlur: true)
                            ->afterStateUpdated(
                                fn($state, callable $set) =>
                                $set('slug', Str::slug($state))
                            ),
                        TextInput::make('slug')
                            ->required()
                            ->unique(ignoreRecord: true)
                            ->helperText('Auto-generated from title. Use lowercase letters and hyphens only. Spaces not allowed !')
                            ->placeholder('e.g. langtang-valley-trek')
                            ->regex('/^[a-z0-9]+(?:-[a-z0-9]+)*$/'),


                        // TextInput::make('title')
                        //     ->required()
                        //     ->live(onBlur: true)
                        //     ->afterStateUpdated(
                        //         fn($state, callable $set) =>
                        //         $set('slug', Str::slug($state))
                        //     ),

                        // // i want my slugs to be be auto-generated-depending upon tile
                        // // and all lowercase ony and - in between them
                        // //  there should not be any spaces in between
                        // // since it will be used in urls.
                        // TextInput::make('slug')
                        //     ->required()
                        //     ->unique(ignoreRecord: true),

                        TextInput::make('destination')
                            ->placeholder('e.g. Solukhumbu'),


                        TextInput::make('duration_label')
                            ->required()
                            ->placeholder('e.g. 7 Days / 6 Nights'),
                        TextInput::make('badge')
                            ->placeholder('e.g. Popular / Cultural'),
                        TextInput::make('max_people_per_trip')
                            ->numeric()
                            ->integer()
                            ->minValue(1)
                            ->required()
                            ->placeholder('e.g. 15'),

                        TextInput::make('total_reviews')
                            ->label('Total Reviews')
                            ->numeric()
                            ->integer()
                            ->minValue(0)
                            ->placeholder('e.g. 120'),

                        TextInput::make('rating')
                            ->label('Review Rating')
                            ->numeric()
                            ->minValue(1)
                            ->maxValue(5)
                            ->step(0.1)
                            ->placeholder('e.g. 4'),

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
                            ->placeholder('e.g. 12 to be considered a group')
                            ->numeric(),
                    ]),
                Section::make('Trip Details')
                    ->columns(2)
                    ->components([

                        Select::make('difficulty')
                            ->options([
                                'easy' => 'Easy',
                                'moderate' => 'Moderate',
                                'hard' => 'Hard',
                            ]),

                        TextInput::make('max_elevation')
                            ->placeholder('e.g. 4,984 m'),
                        // placehoders eg: 400m

                        TextInput::make('best_time')
                            ->placeholder('e.g. Mar–May, Sep–Nov'),
                        // palcehodlers as eg: eg: Jun-Jul


                        TextInput::make('activities')
                            ->label('Activities')
                            ->placeholder('e.g. Trekking, Hiking')
                            ->maxLength(255),

                        TextInput::make('accomodations')
                            ->label('Accommodations')
                            ->placeholder('e.g. Hotel/Lodges')
                            ->maxLength(255),

                        TextInput::make('meals')
                            ->label('Meals')
                            ->placeholder('e.g. B.L.D')
                            ->maxLength(50),


                    ]),

                Section::make('Status')
                    ->columns(2)
                    ->components([

                        Toggle::make('is_featured')
                            ->label('Featured'),



                        Toggle::make('is_luxury')
                            ->label('Luxury')
                            ->default(true),

                        Toggle::make('is_popular')
                            ->label('Popular')
                            ->default(true),
                    ]),

                Section::make('Content')
                    ->collapsed(true)
                    ->lazy() // <--- key optimization
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
                Section::make('Images')
                    ->collapsed(true)
                    ->lazy() // <--- key optimization
                    ->collapsible()
                    ->columnSpanFull()
                    ->components([
                        Repeater::make('images') // This will map to variant_images relationship
                            ->lazy()
                            ->relationship('images') // Make sure the Variant model has a `images()` relation
                            ->schema([
                                FileUpload::make('image_url')
                                    // ->disk("public")
                                    // ->visibility('public')
                                    ->label('Image')
                                    ->image()
                                    ->required(),
                                Toggle::make('is_primary')
                                    ->label('Primary Image')
                                    ->hint('will work as thumbnail image')
                                // ->pasdfla hint user as this willl be shown as thumbnail in product cards..
                            ])
                            ->columns(2)
                            ->addActionLabel('Add Image'),
                        /*
                            Filament\Forms\Components\Repeater::getRelationship(): Return value must be of type Illuminate\Database\Eloquent\Relations\HasOneOrMany|Illuminate\Database\Eloquent\Relations\BelongsToMany|null, Illuminate\Database\Eloquent\Relations\BelongsTo returned */
                        /* TODOD: only one image can be primary image.  like we added rule in  add-member booking section*/
                        /* TODO: only one image can be primary image.  */
                    ]),
                Section::make('SEO')
                    ->collapsed(true)
                    ->lazy() // <--- key optimization
                    ->columnSpanFull()
                    ->components([
                        TextInput::make('meta_title')
                            ->label('Meta Title')
                            ->placeholder('Example: Premium Leather Bags for Men | YourBrand')
                            ->maxLength(65)
                            ->hint('Recommended: 50–60 characters. Maximum: 65 characters.')
                            ->helperText('This appears as the clickable title in search results.'),

                        Textarea::make('meta_description')
                            ->label('Meta Description')
                            ->placeholder('Example: Shop premium leather bags with modern design, durable quality, and affordable prices. Free shipping available.')
                            ->rows(3)
                            ->maxLength(170)
                            ->hint('Recommended: 150–160 characters. Maximum: 170 characters.')
                            ->helperText('This appears as the summary in search engine results.'),

                        TextInput::make('meta_keywords')
                            ->label('Meta Keywords')
                            ->placeholder('Example: leather bags, men bags, laptop bags')
                            ->maxLength(255)
                            ->hint('Optional. Maximum: 255 characters.')
                            ->helperText('Not used by Google, but may be used by some other search engines.'),
                    ]),

                Section::make('Itinerary')
                    ->collapsed(true)
                    ->lazy() // <--- key optimization
                    ->columnSpanFull()
                    ->schema([

                        Repeater::make('itineraries')
                            ->lazy()
                            ->relationship()
                            ->schema([

                                TextInput::make('day_number')
                                    ->numeric()
                                    ->required()
                                    ->label('Day Number'),

                                TextInput::make('title')
                                    ->label('Title'),

                                RichEditor::make('description')
                                    ->required()
                                    ->columnSpanFull(),

                                // Images repeater
                                Repeater::make('images')
                                    ->lazy()
                                    ->relationship()
                                    ->label('Images')
                                    ->schema([

                                        FileUpload::make('image_url')
                                            ->label('Image')
                                            ->image()
                                            // ->directory('itineraries')
                                            ->required()
                                            ->imagePreviewHeight('150')
                                            ->openable()
                                            ->downloadable(),

                                    ])
                                    ->grid(3)
                                    ->collapsible()
                                    ->addActionLabel('Add Image'),

                            ])
                            ->itemLabel(
                                fn($state) =>
                                isset($state['day_number'])
                                    ? "Day {$state['day_number']}"
                                    : null
                            )
                            ->collapsible()
                            ->addActionLabel('Add Day'),

                    ]),
                Section::make('FAQs')
                    ->collapsed(true)
                    ->collapsible()
                    ->lazy() // <--- key optimization
                    ->schema([
                        Repeater::make('faqs')
                            ->collapsed(true)
                            ->relationship()
                            ->lazy()
                            ->label('Package FAQs')
                            ->schema([
                                TextInput::make('question')
                                    ->label('Question')
                                    ->required()
                                    ->columnSpanFull(),

                                RichEditor::make('answer')
                                    ->label('Answer')
                                    ->required()
                                    ->columnSpanFull(),

                                Toggle::make('is_active')
                                    ->label('Active')
                                    ->default(true),

                                TextInput::make('sort_order')
                                    ->numeric()
                                    ->default(0)
                                    ->label('Order'),

                            ])
                            ->columns(2)
                            ->collapsible()
                            ->reorderable()
                            ->itemLabel(
                                fn($state) =>
                                isset($state['question'])
                                    ? Str::limit($state['question'], 40)
                                    : null
                            )
                            ->addActionLabel('Add FAQ'),

                    ])
                    ->collapsible()
                    ->collapsed(false)
                    ->columnSpanFull(),

                // RichEditor::make('inclusions')
                //                 ->label('Inclusions')
                //                 ->required()
                //                 ->columnSpanFull(),


                //                 RichEditor::make('exclusions')
                //                 ->label('Exclusions')
                //                 ->required()
                //                 ->columnSpanFull(),
                Section::make('Cost Inclusions')
                    ->collapsible()
                    ->collapsed(true)
                    ->lazy() // <--- key optimization
                    ->schema([
                        Repeater::make('inclusions')
                            ->lazy()
                            ->relationship(
                                name: 'costClauses',
                                modifyQueryUsing: fn($query) => $query->where('type', 'inclusion')
                            )
                            ->schema([
                                Textarea::make('description')
                                    ->label('Inclusion')
                                    ->required()
                                    ->rows(2)
                                    ->placeholder('Example: Airport pickup and drop')
                                    ->columnSpanFull(),
                            ])
                            ->addActionLabel('Add Inclusion')
                            ->mutateRelationshipDataBeforeCreateUsing(fn($data) => [
                                ...$data,
                                'type' => 'inclusion',
                            ])
                            ->mutateRelationshipDataBeforeSaveUsing(fn($data) => [
                                ...$data,
                                'type' => 'inclusion',
                            ])
                            ->reorderable()
                            ->collapsible()
                            ->cloneable()
                            ->columnSpanFull(),

                    ])
                    ->columnSpanFull(),

                Section::make('Cost Exclusions')
                    ->collapsible()
                    ->collapsed(true)
                    ->lazy() // <--- key optimization
                    ->schema([
                        Repeater::make('exclusions')
                            ->lazy()
                            ->relationship(
                                name: 'costClauses',
                                modifyQueryUsing: fn($query) => $query->where('type', 'exclusion')
                            )
                            ->schema([
                                Textarea::make('description')
                                    ->label('Exclusion')
                                    ->required()
                                    ->rows(2)
                                    ->placeholder('Example: International flights')
                                    ->columnSpanFull(),
                            ])
                            ->addActionLabel('Add Exclusion')
                            ->mutateRelationshipDataBeforeCreateUsing(fn($data) => [
                                ...$data,
                                'type' => 'exclusion',
                            ])
                            ->mutateRelationshipDataBeforeSaveUsing(fn($data) => [
                                ...$data,
                                'type' => 'exclusion',
                            ])
                            ->reorderable()
                            ->collapsible()
                            ->cloneable()
                            ->columnSpanFull(),

                    ])
                    ->columnSpanFull(),


                Section::make('Draft / Publish')
                    ->columnSpanFull()
                    ->components([
                        Toggle::make('is_active')
                            ->label('Publish')
                            ->default(false)
                            ->hint('If off, the package will remain in draft and not be visible to users.')
                    ])
            ]);
    }
}
