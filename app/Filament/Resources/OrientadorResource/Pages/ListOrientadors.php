<?php

namespace App\Filament\Resources\OrientadorResource\Pages;

use App\Filament\Resources\OrientadorResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListOrientadors extends ListRecords
{
    protected static string $resource = OrientadorResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
