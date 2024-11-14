<?php
namespace App\Filament\Resources\FunctionaryResource\Api;

use Rupadana\ApiService\ApiService;
use App\Filament\Resources\FunctionaryResource;
use Illuminate\Routing\Router;


class FunctionaryApiService extends ApiService
{
    protected static string | null $resource = FunctionaryResource::class;

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
