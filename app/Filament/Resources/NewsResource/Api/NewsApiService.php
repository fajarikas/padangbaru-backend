<?php
namespace App\Filament\Resources\NewsResource\Api;

use Rupadana\ApiService\ApiService;
use App\Filament\Resources\NewsResource;
use Illuminate\Routing\Router;


class NewsApiService extends ApiService
{
    protected static string | null $resource = NewsResource::class;

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
