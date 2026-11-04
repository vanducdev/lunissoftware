<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('order_code', 50)->unique();
            $table->foreignId('user_id')->nullable()->constrained('users')->nullOnDelete();
            $table->string('customer_name');
            $table->string('customer_email')->index();
            $table->string('customer_phone', 30)->index();
            $table->foreignId('product_id')->nullable()->constrained('products')->nullOnDelete();
            $table->string('product_name');
            $table->string('plan_name');
            $table->string('billing_cycle', 50)->default('yearly');
            $table->decimal('amount', 12, 2);
            $table->string('currency', 10)->default('VND');
            $table->string('payment_method', 50)->default('vietqr');
            $table->string('payment_status', 30)->default('pending')->index();
            $table->string('license_key', 100)->nullable()->unique();
            $table->integer('license_duration_days')->default(365);
            $table->timestamp('license_expires_at')->nullable();
            $table->integer('device_count_allowed')->default(1);
            $table->integer('device_count_used')->default(0);
            $table->timestamp('activated_at')->nullable();
            $table->text('admin_notes')->nullable();
            $table->string('ip_address', 45)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
