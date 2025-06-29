<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MonografiaResource\Pages;
use App\Models\Monografia;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\FileUpload;
use Filament\Resources\Resource;
use Filament\Tables\Table;
use Filament\Tables;

class MonografiaResource extends Resource
{
    protected static ?string $model = Monografia::class;

    protected static ?string $navigationIcon = 'heroicon-o-book-open';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('estudante_id')
                    ->label('Estudante')
                    ->relationship('estudante', 'naran')
                    ->required(),

                TextInput::make('titulun')
                    ->label('Titulun Monografia')
                    ->required()
                    ->maxLength(255),

                Select::make('area_estudu')
                    ->label('Area Estudu')
                    ->options([
                     'Programing' => 'Programing',
                    'Networking' => 'Networking',
                    'Multimedia' => 'Multimedia',
                    'Outros' => 'Outros',
                    ])
                    ->required(),

                TextInput::make('palavras_chave')
                    ->label('Palavras Chave')
                    ->helperText('Separadu ho vírgula')
                    ->required(),

                Textarea::make('resumu')
                    ->label('Resumu')
                    ->rows(5)
                    ->required(),

                Select::make('orientador_id')
                    ->label('Orientador')
                    ->relationship('orientador', 'naran')
                    ->required(),

                Select::make('estadu')
                    ->label('Estadu')
                    ->options([
                        'halo' => 'Halo',
                        'submete' => 'Submete',
                        'aprovadu' => 'Aprovadu',
                        'rejeita' => 'Rejeita',
                    ])
                    ->default('halo')
                    ->required(),

                FileUpload::make('dokumentu_path')
                    ->label('Upload Dokumentu (PDF/DOC)')
                    ->acceptedFileTypes([
                        'application/pdf',
                        'application/msword',
                        'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
                    ])
                    ->required()
                    ->maxSize(10240), // 10MB

                Textarea::make('komentariu')
                    ->label('Komentáriu')
                    ->nullable()
                    ->rows(3),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('titulun')->label('Titulun'),
                Tables\Columns\TextColumn::make('area_estudu')->label('Area Estudu'),
                Tables\Columns\TextColumn::make('palavras_chave')->label('Keywords'),
                Tables\Columns\TextColumn::make('estudante.naran')->label('Estudante'),
                Tables\Columns\TextColumn::make('estudante.departamentu.naran')->label('Departamentu'),
                Tables\Columns\TextColumn::make('orientador.naran')->label('Orientador'),
                Tables\Columns\TextColumn::make('estadu')->label('Estadu'),
                Tables\Columns\TextColumn::make('dokumentu_path')->label('Dokumentu')->limit(30),
                Tables\Columns\TextColumn::make('komentariu')->label('Komentáriu')->limit(50),
                Tables\Columns\TextColumn::make('created_at')->label('Data Registu')->dateTime(),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListMonografias::route('/'),
            'create' => Pages\CreateMonografia::route('/create'),
            'edit' => Pages\EditMonografia::route('/{record}/edit'),
            'view' => Pages\ViewMonografia::route('/{record}'),
        ];
    }
}
