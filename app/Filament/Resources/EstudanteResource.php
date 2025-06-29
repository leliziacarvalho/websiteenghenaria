<?php
namespace App\Filament\Resources;

use App\Filament\Resources\EstudanteResource\Pages;
use App\Models\Estudante;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Table;
use Filament\Tables;

class EstudanteResource extends Resource
{
    protected static ?string $model = Estudante::class;

    protected static ?string $navigationIcon = 'heroicon-o-academic-cap';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('numeru_estudante')
                    ->label('Numeru Estudante')
                    ->required()
                    ->maxLength(100),

                Forms\Components\TextInput::make('nim')
                    ->label('NIM')
                    ->required()
                    ->maxLength(100),

                Forms\Components\TextInput::make('naran')
                    ->label('Naran Estudante')
                    ->required()
                    ->maxLength(255),

                Forms\Components\TextInput::make('email')
                    ->label('Email')
                    ->email()
                    ->required()
                    ->maxLength(255),

                Forms\Components\Select::make('departamentu_id')
                    ->label('Departamentu')
                    ->relationship('departamentu', 'naran')
                    ->required(),

                Forms\Components\TextInput::make('telefone')
                    ->label('Telefone')
                    ->tel()
                    ->nullable(),

                Forms\Components\DatePicker::make('data_moris')
                    ->label('Data Moris')
                    ->nullable(),

                Forms\Components\Select::make('generu')
                    ->label('Generu')
                    ->options([
                        'mane' => 'Mane',
                        'feto' => 'Feto',
                    ])
                    ->nullable(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('naran')->label('Naran'),
                Tables\Columns\TextColumn::make('email')->label('Email'),
                Tables\Columns\TextColumn::make('nim')->label('NIM'),
                Tables\Columns\TextColumn::make('departamentu.naran')->label('Departamentu'),
                Tables\Columns\TextColumn::make('telefone')->label('Telefone')->default('-'),
                Tables\Columns\TextColumn::make('data_moris')->label('Data Moris')->date(),
                Tables\Columns\TextColumn::make('generu')->label('Generu')->default('-'),
                Tables\Columns\TextColumn::make('created_at')->dateTime()->label('Data Registu'),
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
            'index' => Pages\ListEstudantes::route('/'),
            'create' => Pages\CreateEstudante::route('/create'),
            'edit' => Pages\EditEstudante::route('/{record}/edit'),
        ];
    }
}
