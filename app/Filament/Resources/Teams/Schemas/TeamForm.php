<?php

namespace App\Filament\Resources\Teams\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class TeamForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                TextInput::make('name')
                    ->label('Full Name')
                    ->placeholder('Example: Sagar Tamang')
                    ->required()
                    ->maxLength(255),

                FileUpload::make('image')
                    // ->disk('public')  // Use the public disk
                    ->label('Profile Image')
                    ->image()
                    // ->visibility('public')
                    ->imagePreviewHeight('150')
                    ->placeholder('Upload profile image'),

                TextInput::make('designation')
                    ->label('Designation')
                    ->placeholder('Example: Guide, Porter, Team Leader')
                    ->maxLength(255),

                TextInput::make('department')
                    ->label('Department')
                    ->placeholder('Example: Guide, Executive, Marketing')
                    ->maxLength(255),

                TextInput::make('contact')
                    ->label('Contact')
                    ->placeholder('Example: 9812345678, sagar@gmail.com')
                    ->maxLength(255),

                Textarea::make('description')
                    ->label('Description')
                    ->placeholder('Write short description about the team member...')
                    ->rows(4)
                    ->columnSpanFull(),

            ]);
    }
}
