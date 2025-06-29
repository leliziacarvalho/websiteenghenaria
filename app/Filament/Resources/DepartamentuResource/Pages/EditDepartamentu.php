<?php

namespace App\Filament\Resources\DepartamentuResource\Pages;

use App\Filament\Resources\DepartamentuResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDepartamentu extends EditRecord
{
    protected static string $resource = DepartamentuResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
