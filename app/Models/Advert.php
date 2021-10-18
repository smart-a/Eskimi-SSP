<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use PhpParser\Node\Expr\Array_;

class Advert extends Model
{
    use HasFactory;

    protected $fillable = [
        'advert_name',
        'date_from',
        'date_to',
        'total_budget',
        'daily_budget'
    ];

    public function banner() : HasMany
    {
        return $this->HasMany(Banner::class, 'advert_id');
    }
}
