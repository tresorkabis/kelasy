<?php

namespace App\Filament\Resources\AnneeScolaireResource\Pages;

use App\Filament\Resources\AnneeScolaireResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewAnneeScolaire extends ViewRecord
{
    protected static string $resource = AnneeScolaireResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
