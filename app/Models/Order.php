<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_code',
        'user_id',
        'customer_name',
        'customer_email',
        'customer_phone',
        'product_id',
        'product_name',
        'plan_name',
        'billing_cycle',
        'amount',
        'currency',
        'payment_method',
        'payment_status',
        'license_key',
        'license_duration_days',
        'license_expires_at',
        'device_count_allowed',
        'device_count_used',
        'activated_at',
        'admin_notes',
        'ip_address',
    ];

    protected function casts(): array
    {
        return [
            'amount' => 'decimal:2',
            'license_duration_days' => 'integer',
            'license_expires_at' => 'datetime',
            'activated_at' => 'datetime',
            'device_count_allowed' => 'integer',
            'device_count_used' => 'integer',
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public static function generateLicenseKey(): string
    {
        do {
            $key = 'LUSH-'.strtoupper(Str::random(4)).'-'.strtoupper(Str::random(4)).'-'.strtoupper(Str::random(4));
        } while (self::where('license_key', $key)->exists());

        return $key;
    }

    public function activateLicense(?int $days = null): void
    {
        $duration = $days ?? $this->license_duration_days;
        if (strtolower($this->billing_cycle) === 'lifetime') {
            $expiresAt = null;
        } else {
            $expiresAt = now()->addDays($duration);
        }

        $this->update([
            'payment_status' => 'paid',
            'license_key' => $this->license_key ?: self::generateLicenseKey(),
            'activated_at' => now(),
            'license_duration_days' => $duration,
            'license_expires_at' => $expiresAt,
        ]);
    }

    public function isExpired(): bool
    {
        if (strtolower($this->billing_cycle) === 'lifetime' || is_null($this->license_expires_at)) {
            return false;
        }

        return $this->license_expires_at->isPast();
    }

    public function isActive(): bool
    {
        return $this->payment_status === 'paid' && ! $this->isExpired();
    }

    public function scopePaid($query)
    {
        return $query->where('payment_status', 'paid');
    }

    public function scopePending($query)
    {
        return $query->where('payment_status', 'pending');
    }
}
