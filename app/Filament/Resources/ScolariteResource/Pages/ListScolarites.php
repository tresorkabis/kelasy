<?php

namespace App\Filament\Resources\ScolariteResource\Pages;

use App\Filament\Resources\ScolariteResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListScolarites extends ListRecords
{
    protected static string $resource = ScolariteResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
