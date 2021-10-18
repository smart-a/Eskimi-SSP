<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Banner extends Model
{
    use HasFactory;

    protected $fillable = [
        'advert_id',
        'image'
    ];

    public function advert(): BelongsTo
    {
        return $this->belongsTo(Advert::class);
    }
}
