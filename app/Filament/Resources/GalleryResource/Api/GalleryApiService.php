<?php
namespace App\Filament\Resources\GalleryResource\Api;

use Rupadana\ApiService\ApiService;
use App\Filament\Resources\GalleryResource;
use Illuminate\Routing\Router;


class GalleryApiService extends ApiService
{
    protected static string | null $resource = GalleryResource::class;

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
