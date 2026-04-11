<?php

namespace App\Filament\Resources\Blogs\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\MultiSelect;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;



class BlogForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                // TextInput::make('category'),
                TextInput::make('category')
                    ->required()
                    ->live()
                    ->afterStateUpdated(function ($state, callable $set) {
                        // Remove all spaces
                        $set('category', str_replace(' ', '', $state));
                    })
                    ->rule('regex:/^\S+$/') // validation: no whitespace allowed
                    ->helperText('Spaces are not allowed.'),
                //         TextInput::make('title')
                //             ->required()
                //             ->live(onBlur: true)
                //             ->afterStateUpdated(
                //                 fn($state, callable $set,$record) {
                //                 // $set('slug', Str::slug($state))
                //                 if (!$record) {
                //     $set('slug', Str::slug($state));
                //                 }
                // }
                //             ),
                TextInput::make('title')
                    ->required()
                    ->live(onBlur: true)
                    ->afterStateUpdated(function ($state, callable $set, $record) {
                        // Only generate slug during creation
                        if (!$record) {
                            $set('slug', Str::slug($state));
                        }
                    }),
                TextInput::make('slug')
                    ->required()
                    ->unique(ignoreRecord: true)
                    ->helperText('Auto-generated from title during creation only. Use lowercase letters and hyphens only. Spaces not allowed !')
                    // ->placeholder('e.g. langtang-valley-trek')
                    ->regex('/^[a-z0-9]+(?:-[a-z0-9]+)*$/'),
                // FIXME: should be unique...

                FileUpload::make('image_url')
                    ->maxSize(2048)
                    ->hint("Max 2MB file size")
                    ->image(),
                RichEditor::make('content') // rich text editor
                    ->required()
                    ->extraAttributes(['style' => 'min-height: 600px;'])
                    ->columnSpanFull(),

                TextInput::make('user_id')
                    ->label('Created By')
                    ->formatStateUsing(fn($state) => \App\Models\User::find($state)?->name ?? '—')
                    ->disabled()
                    ->dehydrated(false),

                TextInput::make('initial_view_count')
                    ->required()
                    ->numeric()
                    ->default(0),
                TextInput::make('view_count')
                    ->required()
                    ->numeric()
                    ->default(0),

                TextInput::make('meta_title')
                    ->label('Meta Title')
                    ->maxLength(60),

                Textarea::make('meta_description')
                    ->label('Meta Description')
                    ->maxLength(160),

                TextInput::make('meta_keywords')
                    ->label('Meta Keywords')
                    ->helperText('Comma separated keywords'),

                FileUpload::make('meta_image')
                    ->label('Meta Image')
                    ->maxSize(1024)
                    ->hint('1MB max file size allowed.')
                    ->image(),

                Select::make('relatedBlogs')
                    ->multiple()
                    ->relationship(
                        name: 'relatedBlogs',
                        titleAttribute: 'title',
                        modifyQueryUsing: function ($query, $record) {
                            if ($record) {
                                $query->where('blogs.id', '!=', $record->id);
                            }
                        }
                    )
                    ->getOptionLabelFromRecordUsing(
                        fn($record) =>
                        "{$record->title} (ID: {$record->id}) - {$record->category}"
                    )
                    ->searchable()
                    ->preload(),

                Select::make('packages')
                    ->label('Related Packages')
                    ->hint('Select packages related to this blog post')
                    ->relationship('packages', 'title') // change 'name' to your package column
                    ->getOptionLabelFromRecordUsing(
                        fn($record) =>
                        "{$record->title} ({$record->duration_label})"
                    )
                    ->multiple()
                    ->preload()
                    ->searchable(),
                // make thenm in a single row
                // Toggle::make('is_featured')
                //     ->required(),
                // Toggle::make('is_published')
                //     ->required(),
                Grid::make(2)
                    ->columnSpanFull()
                    ->schema([
                        Toggle::make('is_featured')
                            ->required(),
                        Toggle::make('is_published')
                            ->required(),
                    ]),
            ]);
    }
}
