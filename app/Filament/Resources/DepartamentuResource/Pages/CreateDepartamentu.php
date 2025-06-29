<?php

namespace App\Filament\Resources\DepartamentuResource\Pages;

use App\Filament\Resources\DepartamentuResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateDepartamentu extends CreateRecord
{
    protected static string $resource = DepartamentuResource::class;
    protected function getRedirectUrl(): string
    {
        // Redirect ke index Monografia setelah create sukses
        return $this->getResource()::getUrl('index');
    }
}
