<?php

namespace App\Models;

use App\Traits\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProductFeature extends Model
{
    use HasFactory, HasTranslations;

    protected $fillable = [
        'product_id',
        'title',
        'description',
        'icon',
        'order',
        'translations',
    ];

    protected function casts(): array
    {
        return [
            'translations' => 'array',
            'order' => 'integer',
        ];
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
