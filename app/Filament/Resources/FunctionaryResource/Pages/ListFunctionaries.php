<?php

namespace App\Filament\Resources\FunctionaryResource\Pages;

use App\Filament\Resources\FunctionaryResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListFunctionaries extends ListRecords
{
    protected static string $resource = FunctionaryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
