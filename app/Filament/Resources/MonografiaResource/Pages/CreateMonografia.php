<?php
namespace App\Filament\Resources\MonografiaResource\Pages;

use App\Filament\Resources\MonografiaResource;
use Filament\Resources\Pages\CreateRecord;

class CreateMonografia extends CreateRecord
{
    protected static string $resource = MonografiaResource::class;

    protected function getRedirectUrl(): string
    {
        // Redirect ke index Monografia setelah create sukses
        return $this->getResource()::getUrl('index');
    }
}
