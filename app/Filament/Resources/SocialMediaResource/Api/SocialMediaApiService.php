<?php
namespace App\Filament\Resources\SocialMediaResource\Api;

use Rupadana\ApiService\ApiService;
use App\Filament\Resources\SocialMediaResource;
use Illuminate\Routing\Router;


class SocialMediaApiService extends ApiService
{
    protected static string | null $resource = SocialMediaResource::class;

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
