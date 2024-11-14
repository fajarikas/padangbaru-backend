<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Functionary extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'title_id', 'picture'];

    public function title()
    {
        return $this->belongsTo(Title::class);
    }
}
