<?php

namespace App\Filament\Resources\NewsTypeResource\Pages;

use App\Filament\Resources\NewsTypeResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListNewsTypes extends ListRecords
{
    protected static string $resource = NewsTypeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
