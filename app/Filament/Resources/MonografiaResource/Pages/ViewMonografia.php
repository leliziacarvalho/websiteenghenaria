<?php

namespace App\Filament\Resources\MonografiaResource\Pages;

use App\Filament\Resources\MonografiaResource;
use Filament\Resources\Pages\ViewRecord;
use Filament\Forms\Form;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\FileUpload;

class ViewMonografia extends ViewRecord
{
    protected static string $resource = MonografiaResource::class;

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('titulun')
                    ->label('Titulun Monografia')
                    ->disabled(),

                Select::make('area_estudu')
                    ->label('Área Estudu')
                    ->options([
                        'Programing' => 'Programing',
                        'Networking' => 'Networking',
                        'Multimedia' => 'Multimedia',
                        'Outros' => 'Outros',
                    ])
                    ->disabled(),

                Textarea::make('resumu')
                    ->label('Resumu')
                    ->disabled(),

                TextInput::make('palavras_chave')
                    ->label('Palavras Chave')
                    ->disabled(),

                TextInput::make('estadu')
                    ->label('Estado')
                    ->disabled(),

                TextInput::make('estudante.naran')
                    ->label('Naran Estudante')
                    ->disabled(),

                TextInput::make('estudante.numeru_estudante')
                    ->label('Numeru Estudante')
                    ->disabled(),

                TextInput::make('estudante.departamentu.naran')
                    ->label('Departamentu Estudante')
                    ->disabled(),

                TextInput::make('orientador.naran')
                    ->label('Orientador')
                    ->disabled(),

                Textarea::make('komentariu')
                    ->label('Komentariu')
                    ->disabled()
                    ->rows(4),

                TextInput::make('created_at')
                    ->label('Data Registu')
                    ->disabled(),

                TextInput::make('dokumentu_path')
                    ->label('Dokumentu Upload')
                    ->disabled()
                    ->suffixAction(
                        \Filament\Forms\Components\Actions\Action::make('Download')
                            ->icon('heroicon-o-arrow-down-tray')
                            ->url(fn ($record) => asset('storage/' . $record->dokumentu_path))
                            ->openUrlInNewTab()
                    ),
            ]);
    }
}
