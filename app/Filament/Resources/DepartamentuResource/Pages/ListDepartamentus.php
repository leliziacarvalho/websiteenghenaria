<?php

namespace App\Filament\Resources\DepartamentuResource\Pages;

use App\Filament\Resources\DepartamentuResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListDepartamentus extends ListRecords
{
    protected static string $resource = DepartamentuResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
