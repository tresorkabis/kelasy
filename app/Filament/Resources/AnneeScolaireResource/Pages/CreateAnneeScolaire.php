<?php

namespace App\Filament\Resources\AnneeScolaireResource\Pages;

use App\Filament\Resources\AnneeScolaireResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateAnneeScolaire extends CreateRecord
{
    protected static string $resource = AnneeScolaireResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
