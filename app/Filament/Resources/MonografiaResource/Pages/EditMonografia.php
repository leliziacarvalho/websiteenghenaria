<?php

namespace App\Filament\Resources\MonografiaResource\Pages;

use App\Filament\Resources\MonografiaResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Filament\Notifications\Notification;

class EditMonografia extends EditRecord
{
    protected static string $resource = MonografiaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function afterSave(): void
    {
        // Menampilkan notifikasi sukses
        Notification::make()
            ->title('Monografia editadu ho susesu!')
            ->success()
            ->send();

        // Redirect ke halaman index monografia
        $this->redirect(MonografiaResource::getUrl('index'));
    }
}
