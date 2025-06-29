<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DepartamentuResource\Pages;
use App\Models\Departamentu;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class DepartamentuResource extends Resource
{
    protected static ?string $model = Departamentu::class;

   protected static ?string $navigationIcon = 'heroicon-o-folder';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('naran')
                    ->label('Naran Departamentu')
                    ->options([
                        'Informatika' => 'Informatika',
                        'Industria' => 'Industria',
                        'Geologia' => 'Geologia',
                        'Petroleo' => 'Petroleo',
                    ])
                    ->required(),

                Forms\Components\Textarea::make('deskrisaun')
                    ->label('Deskrisaun')
                    ->rows(3)
                    ->nullable(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('naran')->label('Naran Departamentu')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('deskrisaun')->label('Deskrisaun')->limit(50),
                Tables\Columns\TextColumn::make('created_at')->label('Data Cria')->dateTime()->sortable(),
            ])
            ->filters([
                //
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
            'index' => Pages\ListDepartamentus::route('/'),
            'create' => Pages\CreateDepartamentu::route('/create'),
            'edit' => Pages\EditDepartamentu::route('/{record}/edit'),
        ];
    }
}
