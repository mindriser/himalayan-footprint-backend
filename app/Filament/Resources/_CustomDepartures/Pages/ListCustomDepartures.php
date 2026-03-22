<?php

namespace App\Filament\Resources\CustomDepartures\Pages;

use App\Filament\Resources\CustomDepartures\CustomDeparturesResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListCustomDepartures extends ListRecords
{
    protected static string $resource = CustomDeparturesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
