<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OrientadorResource\Pages;
use App\Models\Orientador;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Table;
use Filament\Tables;

class OrientadorResource extends Resource
{
    protected static ?string $model = Orientador::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('naran')
                    ->label('Naran Orientador')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Select::make('departamentu_id')
                    ->label('Departamentu')
                    ->relationship('departamentu', 'naran')
                    ->required(),

                Forms\Components\TextInput::make('email')
                    ->label('Email')
                    ->email()
                    ->required()
                    ->maxLength(255),

                Forms\Components\TextInput::make('telefone')
                    ->label('Telefone')
                    ->maxLength(20),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                 Tables\Columns\TextColumn::make('naran')->label('Naran'),
            Tables\Columns\TextColumn::make('departamentu.naran')->label('Departamentu'),
            Tables\Columns\TextColumn::make('email')->label('Email'),
            Tables\Columns\TextColumn::make('telefone')->label('Telefone'),
            Tables\Columns\TextColumn::make('created_at')->dateTime()->label('Data Registu'),
            ])
            ->actions([
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
            'index' => Pages\ListOrientadors::route('/'),
            'create' => Pages\CreateOrientador::route('/create'),
            'edit' => Pages\EditOrientador::route('/{record}/edit'),
        ];
    }
}
