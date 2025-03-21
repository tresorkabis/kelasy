<?php

namespace App\Filament\Resources\TuteurResource\Pages;

use App\Filament\Resources\TuteurResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTuteur extends EditRecord
{
    protected static string $resource = TuteurResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
