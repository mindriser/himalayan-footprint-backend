<?php

namespace App\Filament\Resources\CustomDepartures\Pages;

use App\Filament\Resources\CustomDepartures\CustomDeparturesResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditCustomDepartures extends EditRecord
{
    protected static string $resource = CustomDeparturesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
