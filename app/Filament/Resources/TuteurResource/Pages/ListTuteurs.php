<?php

namespace App\Filament\Resources\TuteurResource\Pages;

use App\Filament\Resources\TuteurResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTuteurs extends ListRecords
{
    protected static string $resource = TuteurResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
