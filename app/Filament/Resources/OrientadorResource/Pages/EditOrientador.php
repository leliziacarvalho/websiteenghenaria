<?php

namespace App\Filament\Resources\OrientadorResource\Pages;

use App\Filament\Resources\OrientadorResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditOrientador extends EditRecord
{
    protected static string $resource = OrientadorResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
