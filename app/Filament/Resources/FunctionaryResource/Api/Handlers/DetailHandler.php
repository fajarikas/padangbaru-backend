<?php

namespace App\Filament\Resources\FunctionaryResource\Api\Handlers;

use App\Filament\Resources\SettingResource;
use App\Filament\Resources\FunctionaryResource;
use Rupadana\ApiService\Http\Handlers;
use Spatie\QueryBuilder\QueryBuilder;
use Illuminate\Http\Request;

class DetailHandler extends Handlers
{
    public static string | null $uri = '/{id}';
    public static string | null $resource = FunctionaryResource::class;


    public function handler(Request $request)
    {
        $id = $request->route('id');

        $query = static::getEloquentQuery()->with('title');

        $query = QueryBuilder::for(
            $query->where(static::getKeyName(), $id)
        )
            ->allowedIncludes(['title'])
            ->first();

        if (!$query) return static::sendNotFoundResponse();

        $transformer = static::getApiTransformer();

        return new $transformer($query);
    }
}
