<?php

namespace App\Filament\Resources\MonografiaResource\Pages;

use App\Filament\Resources\MonografiaResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMonografias extends ListRecords
{
    protected static string $resource = MonografiaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
