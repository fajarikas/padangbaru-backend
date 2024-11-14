<?php
namespace App\Filament\Resources\TitleResource\Api;

use Rupadana\ApiService\ApiService;
use App\Filament\Resources\TitleResource;
use Illuminate\Routing\Router;


class TitleApiService extends ApiService
{
    protected static string | null $resource = TitleResource::class;

    public static function handlers() : array
    {
        return [
            Handlers\CreateHandler::class,
            Handlers\UpdateHandler::class,
            Handlers\DeleteHandler::class,
            Handlers\PaginationHandler::class,
            Handlers\DetailHandler::class
        ];

    }
}
