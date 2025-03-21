<?php

namespace App\Filament\Resources\ScolariteResource\Pages;

use App\Filament\Resources\ScolariteResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewScolarite extends ViewRecord
{
    protected static string $resource = ScolariteResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
