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
        // 1. Product Categories
        Schema::create('product_categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->text('description')->nullable();
            $table->string('icon')->nullable();
            $table->integer('order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });

        // 2. Products
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->nullable()->constrained('product_categories')->nullOnDelete();
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('tagline')->nullable();
            $table->text('description')->nullable();
            $table->longText('content')->nullable();
            $table->string('logo')->nullable();
            $table->string('banner_image')->nullable();
            $table->string('video_url')->nullable();
            $table->string('version')->default('v1.0.0');
            $table->string('download_url')->nullable();
            $table->boolean('is_featured')->default(false);
            $table->string('status')->default('published'); // 'draft', 'published'
            $table->unsignedBigInteger('view_count')->default(0);
            $table->integer('order')->default(0);
            $table->json('translations')->nullable(); // For vi, en, zh, ko overrides
            $table->timestamps();
        });

        // 3. Product Features
        Schema::create('product_features', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained('products')->cascadeOnDelete();
            $table->string('title');
            $table->text('description')->nullable();
            $table->string('icon')->nullable();
            $table->integer('order')->default(0);
            $table->json('translations')->nullable();
            $table->timestamps();
        });

        // 4. Product Gallery Images
        Schema::create('product_images', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained('products')->cascadeOnDelete();
            $table->string('image_path');
            $table->string('caption')->nullable();
            $table->integer('order')->default(0);
            $table->timestamps();
        });

        // 5. Product Pricings
        Schema::create('product_pricings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained('products')->cascadeOnDelete();
            $table->string('plan_name');
            $table->decimal('price', 12, 0)->default(0);
            $table->string('currency')->default('₫');
            $table->string('billing_cycle')->default('yearly'); // 'monthly', 'yearly', 'lifetime'
            $table->boolean('is_popular')->default(false);
            $table->json('features')->nullable();
            $table->string('cta_text')->default('Đăng ký ngay');
            $table->string('cta_link')->nullable();
            $table->integer('order')->default(0);
            $table->timestamps();
        });

        // 6. Product FAQs
        Schema::create('product_faqs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained('products')->cascadeOnDelete();
            $table->text('question');
            $table->text('answer');
            $table->integer('order')->default(0);
            $table->json('translations')->nullable();
            $table->timestamps();
        });

        // 7. Article Categories
        Schema::create('article_categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->text('description')->nullable();
            $table->integer('order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });

        // 8. Articles (CMS & Blog)
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->nullable()->constrained('article_categories')->nullOnDelete();
            $table->foreignId('author_id')->nullable()->constrained('users')->nullOnDelete();
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('excerpt')->nullable();
            $table->longText('content');
            $table->string('thumbnail')->nullable();
            $table->string('status')->default('published'); // 'draft', 'published', 'scheduled'
            $table->timestamp('published_at')->nullable();
            $table->string('seo_title')->nullable();
            $table->text('seo_description')->nullable();
            $table->string('seo_keywords')->nullable();
            $table->unsignedBigInteger('view_count')->default(0);
            $table->boolean('is_featured')->default(false);
            $table->json('translations')->nullable();
            $table->timestamps();
        });

        // 9. Banners
        Schema::create('banners', function (Blueprint $table) {
            $table->id();
            $table->string('badge')->nullable();
            $table->string('title');
            $table->text('subtitle')->nullable();
            $table->string('image')->nullable();
            $table->string('link_url')->nullable();
            $table->string('link_text')->nullable();
            $table->string('secondary_link_url')->nullable();
            $table->string('secondary_link_text')->nullable();
            $table->string('position')->default('home_hero');
            $table->integer('order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });

        // 10. Testimonials
        Schema::create('testimonials', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('position')->nullable();
            $table->string('company')->nullable();
            $table->string('avatar')->nullable();
            $table->text('content');
            $table->tinyInteger('rating')->default(5);
            $table->integer('order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });

        // 11. Partners
        Schema::create('partners', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('logo')->nullable();
            $table->string('website_url')->nullable();
            $table->integer('order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });

        // 12. Contact Messages
        Schema::create('contact_messages', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('phone')->nullable();
            $table->string('company')->nullable();
            $table->string('subject')->nullable();
            $table->text('message');
            $table->string('product_interest')->nullable();
            $table->string('status')->default('pending'); // 'pending', 'processing', 'resolved'
            $table->text('admin_notes')->nullable();
            $table->timestamps();
        });

        // 13. Website Settings
        Schema::create('website_settings', function (Blueprint $table) {
            $table->id();
            $table->string('key')->unique();
            $table->text('value')->nullable();
            $table->string('group')->default('general');
            $table->timestamps();
        });

        // 14. Activity Logs
        Schema::create('activity_logs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained('users')->nullOnDelete();
            $table->string('action');
            $table->text('description')->nullable();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('activity_logs');
        Schema::dropIfExists('website_settings');
        Schema::dropIfExists('contact_messages');
        Schema::dropIfExists('partners');
        Schema::dropIfExists('testimonials');
        Schema::dropIfExists('banners');
        Schema::dropIfExists('articles');
        Schema::dropIfExists('article_categories');
        Schema::dropIfExists('product_faqs');
        Schema::dropIfExists('product_pricings');
        Schema::dropIfExists('product_images');
        Schema::dropIfExists('product_features');
        Schema::dropIfExists('products');
        Schema::dropIfExists('product_categories');
    }
};
