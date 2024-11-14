<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FunctionaryResource\Pages;
use App\Filament\Resources\FunctionaryResource\RelationManagers;
use App\Models\Functionary;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class FunctionaryResource extends Resource
{
    protected static ?string $model = Functionary::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->label('Nama')
                    ->required()
                    ->columnSpan('full'),
                Select::make('title_id')
                    ->label('Jabatan')
                    ->relationship('title', 'name')
                    ->required()
                    ->columnSpan('full'),
                // ->searchable(),
                FileUpload::make('picture')
                    ->label('Foto')
                    ->disk('public')
                    ->directory('uploads/functionaries')
                    ->columnSpan('full')
                    ->required()
                    ->acceptedFileTypes(['image/*'])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('Nama'),
                TextColumn::make('title.name')
                    ->label('Jabatan'),
                ImageColumn::make('picture')
                    ->label('Foto')
                    ->disk('public')
                    ->url(fn($record) => asset('storage/' . $record->picture))

            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListFunctionaries::route('/'),
            'create' => Pages\CreateFunctionary::route('/create'),
            'edit' => Pages\EditFunctionary::route('/{record}/edit'),
        ];
    }
}
