<?php

namespace App\Filament\Resources\EstudanteResource\Pages;

use App\Filament\Resources\EstudanteResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditEstudante extends EditRecord
{
    protected static string $resource = EstudanteResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
