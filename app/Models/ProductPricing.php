<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProductPricing extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'plan_name',
        'price',
        'currency',
        'billing_cycle',
        'is_popular',
        'features',
        'cta_text',
        'cta_link',
        'order',
    ];

    protected function casts(): array
    {
        return [
            'price' => 'decimal:0',
            'is_popular' => 'boolean',
            'features' => 'array',
            'order' => 'integer',
        ];
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
