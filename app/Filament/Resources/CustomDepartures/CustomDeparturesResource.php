<?php

namespace App\Filament\Resources\CustomDepartures;

use App\Filament\Resources\CustomDepartures\Pages\CreateCustomDepartures;
use App\Filament\Resources\CustomDepartures\Pages\EditCustomDepartures;
use App\Filament\Resources\CustomDepartures\Pages\ListCustomDepartures;
use App\Filament\Resources\CustomDepartures\Schemas\CustomDeparturesForm;
use App\Filament\Resources\CustomDepartures\Tables\CustomDeparturesTable;
use App\Models\Departure;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class CustomDeparturesResource extends Resource
{
    protected static ?string $model = Departure::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'title';

    protected static ?string $navigationLabel = 'Custom Departures Request';  // ADD T


    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->where('type', 'custom')
            ->with('customDetail');

    }


    public static function form(Schema $schema): Schema
    {
        return CustomDeparturesForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return CustomDeparturesTable::configure($table);
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
            'index' => ListCustomDepartures::route('/'),
            'create' => CreateCustomDepartures::route('/create'),
            'edit' => EditCustomDepartures::route('/{record}/edit'),
        ];
    }
}
