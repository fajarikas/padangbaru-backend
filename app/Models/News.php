<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'document', 'detail', 'news_type_id', 'summary'];

    public function news_type()
    {
        return $this->belongsTo(NewsTYpe::class);
    }
}
