<?php

namespace App\Filament\Resources\OrientadorResource\Pages;

use App\Filament\Resources\OrientadorResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateOrientador extends CreateRecord
{
    protected static string $resource = OrientadorResource::class;
    protected function getRedirectUrl(): string
    {
        // Redirect ke index Monografia setelah create sukses
        return $this->getResource()::getUrl('index');
    }
}

