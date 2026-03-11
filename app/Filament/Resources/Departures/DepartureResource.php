<?php

namespace App\Filament\Resources\Departures;

use App\Filament\Resources\Departures\Pages\CreateDeparture;
use App\Filament\Resources\Departures\Pages\EditDeparture;
use App\Filament\Resources\Departures\Pages\ListDepartures;
use App\Filament\Resources\Departures\Schemas\DepartureForm;
use App\Filament\Resources\Departures\Tables\DeparturesTable;
use App\Models\Departure;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

use Illuminate\Database\Eloquent\Builder;

class DepartureResource extends Resource
{

    protected static string | \UnitEnum | null $navigationGroup = 'Packages';

    protected static ?string $model = Departure::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'type';


    // public static function tableQuery(): Builder
    // {
    //     return Departure::query()
    //         ->where('type', 'custom');
    // }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->where('type', 'fixed');
    }


    public static function form(Schema $schema): Schema
    {
        return DepartureForm::configure($schema);
    }


    public static function table(Table $table): Table
    {
        return DeparturesTable::configure($table);
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
            'index' => ListDepartures::route('/'),
            'create' => CreateDeparture::route('/create'),
            'edit' => EditDeparture::route('/{record}/edit'),
        ];
    }
}
