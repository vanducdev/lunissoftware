<?php

namespace App\Models;

use App\Traits\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory, HasTranslations;

    protected $fillable = [
        'category_id',
        'name',
        'slug',
        'tagline',
        'description',
        'content',
        'seo_title',
        'seo_description',
        'seo_keywords',
        'focus_keyword',
        'canonical_url',
        'robots_meta',
        'logo',
        'banner_image',
        'video_url',
        'version',
        'download_url',
        'is_featured',
        'status',
        'view_count',
        'order',
        'translations',
    ];

    protected function casts(): array
    {
        return [
            'is_featured' => 'boolean',
            'translations' => 'array',
            'order' => 'integer',
            'view_count' => 'integer',
        ];
    }

    public function getBannerUrlAttribute(): ?string
    {
        if (! $this->banner_image) {
            return null;
        }
        if (str_starts_with($this->banner_image, 'http://') || str_starts_with($this->banner_image, 'https://')) {
            return $this->banner_image;
        }
        if (str_starts_with($this->banner_image, 'images/')) {
            return asset($this->banner_image);
        }

        return asset('storage/'.$this->banner_image);
    }

    public function getLogoUrlAttribute(): ?string
    {
        if (! $this->logo) {
            return null;
        }
        if (str_starts_with($this->logo, 'http://') || str_starts_with($this->logo, 'https://')) {
            return $this->logo;
        }
        if (str_starts_with($this->logo, 'images/')) {
            return asset($this->logo);
        }

        return asset('storage/'.$this->logo);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(ProductCategory::class, 'category_id');
    }

    public function features(): HasMany
    {
        return $this->hasMany(ProductFeature::class)->orderBy('order');
    }

    public function images(): HasMany
    {
        return $this->hasMany(ProductImage::class)->orderBy('order');
    }

    public function pricings(): HasMany
    {
        return $this->hasMany(ProductPricing::class)->orderBy('order');
    }

    public function faqs(): HasMany
    {
        return $this->hasMany(ProductFaq::class)->orderBy('order');
    }

    public function scopePublished($query)
    {
        return $query->where('status', 'published');
    }

    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }
}
