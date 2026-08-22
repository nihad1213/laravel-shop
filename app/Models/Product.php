<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

#[Fillable(['title', 'slug', 'artist', 'format', 'price', 'stock', 'badge', 'image', 'description', 'is_active'])]
class Product extends Model
{
    protected function casts(): array
    {
        return [
            'price' => 'decimal:2',
            'stock' => 'integer',
            'is_active' => 'boolean',
        ];
    }

    public function bestSeller(): HasOne
    {
        return $this->hasOne(BestSeller::class);
    }
}
