<?php

namespace App\Filament\Resources\EstudanteResource\Pages;

use App\Filament\Resources\EstudanteResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateEstudante extends CreateRecord
{
    protected static string $resource = EstudanteResource::class;
    protected function getRedirectUrl(): string
    {
        // Redirect ke index Monografia setelah create sukses
        return $this->getResource()::getUrl('index');
    }
}

