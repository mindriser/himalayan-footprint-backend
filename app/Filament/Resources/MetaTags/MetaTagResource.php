<?php

namespace App\Filament\Resources\MetaTags;

use App\Filament\Resources\MetaTags\Pages\CreateMetaTag;
use App\Filament\Resources\MetaTags\Pages\EditMetaTag;
use App\Filament\Resources\MetaTags\Pages\ListMetaTags;
use App\Filament\Resources\MetaTags\Schemas\MetaTagForm;
use App\Filament\Resources\MetaTags\Tables\MetaTagsTable;
use App\Models\MetaTag;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class MetaTagResource extends Resource
{
    protected static ?string $model = MetaTag::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'slug';

    public static function form(Schema $schema): Schema
    {
        return MetaTagForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return MetaTagsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListMetaTags::route('/'),
            'create' => CreateMetaTag::route('/create'),
            'edit' => EditMetaTag::route('/{record}/edit'),
        ];
    }
}
