<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class WebsiteSetting extends Model
{
    use HasFactory;

    protected $fillable = [
        'key',
        'value',
        'group',
    ];

    public static function get(string $key, mixed $default = null): mixed
    {
        try {
            $settings = Cache::rememberForever('lush_website_settings', function () {
                return static::all()->pluck('value', 'key')->toArray();
            });

            return $settings[$key] ?? $default;
        } catch (\Throwable $e) {
            return $default;
        }
    }

    public static function set(string $key, mixed $value, string $group = 'general'): self
    {
        $setting = static::updateOrCreate(
            ['key' => $key],
            ['value' => $value, 'group' => $group]
        );

        Cache::forget('lush_website_settings');

        return $setting;
    }
}
