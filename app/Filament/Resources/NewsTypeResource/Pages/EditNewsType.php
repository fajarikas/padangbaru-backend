<?php

namespace App\Filament\Resources\NewsTypeResource\Pages;

use App\Filament\Resources\NewsTypeResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditNewsType extends EditRecord
{
    protected static string $resource = NewsTypeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
