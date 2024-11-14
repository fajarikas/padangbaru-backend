<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewsType extends Model
{
    use HasFactory;

    protected $fillable = ['type'];

    public function news()
    {
        return $this->hasMany(News::class);
    }

    public function news_type()
    {
        return $this->hasMany(News::class);
    }
}
