<?php

namespace App\Filament\Resources;

use App\Filament\Resources\NewsResource\Pages;
use App\Filament\Resources\NewsResource\RelationManagers;
use App\Models\News;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\TextColumn\TextColumnSize;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class NewsResource extends Resource
{
    protected static ?string $model = News::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('title')
                    ->label('Judul')
                    ->required()
                    ->columnSpan('full'),
                FileUpload::make('document')
                    ->disk('public')
                    ->preserveFilenames()
                    ->directory('uploads/news')
                    ->label('Cover')
                    // ->acceptedFileTypes(['image/*'])
                    ->required()
                    ->columnSpan('full'),
                Select::make('news_type_id')
                    ->label('Tipe')
                    ->relationship('news_type', 'type')
                    ->columnSpan('full')
                    // ->searchable()
                    ->required(),

                RichEditor::make('detail')
                    ->label('Konten')
                    ->required()
                    ->columnSpan('full'),
                RichEditor::make('summary')
                    ->label('Rangkuman Berita')
                    ->required()
                    ->columnSpan('full'),


            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')->label('Judul'),
                TextColumn::make('news_type.type')->label('Tipe'),
                ImageColumn::make('document')
                    ->disk('public')
                    ->url(fn($record) => asset('storage/uploads/news/' . $record->img))
                    ->label('Cover'),
                TextColumn::make('summary')->label('Rangkuman'),
                TextColumn::make('detail')->label('Berita')
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
            'index' => Pages\ListNews::route('/'),
            'create' => Pages\CreateNews::route('/create'),
            'edit' => Pages\EditNews::route('/{record}/edit'),
        ];
    }
}
