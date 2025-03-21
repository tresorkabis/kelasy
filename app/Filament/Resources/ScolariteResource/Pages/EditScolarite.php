<?php

namespace App\Filament\Resources\ScolariteResource\Pages;

use App\Filament\Resources\ScolariteResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditScolarite extends EditRecord
{
    protected static string $resource = ScolariteResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
