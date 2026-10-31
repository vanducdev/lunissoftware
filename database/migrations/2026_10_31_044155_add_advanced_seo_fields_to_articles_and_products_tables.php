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
        Schema::table('articles', function (Blueprint $table) {
            $table->string('focus_keyword')->nullable()->after('seo_keywords');
            $table->string('canonical_url')->nullable()->after('focus_keyword');
            $table->string('robots_meta')->default('index, follow')->after('canonical_url');
            $table->unsignedInteger('reading_time')->default(5)->after('robots_meta');
        });

        Schema::table('products', function (Blueprint $table) {
            $table->string('seo_title')->nullable()->after('content');
            $table->text('seo_description')->nullable()->after('seo_title');
            $table->string('seo_keywords')->nullable()->after('seo_description');
            $table->string('focus_keyword')->nullable()->after('seo_keywords');
            $table->string('canonical_url')->nullable()->after('focus_keyword');
            $table->string('robots_meta')->default('index, follow')->after('canonical_url');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('articles', function (Blueprint $table) {
            $table->dropColumn(['focus_keyword', 'canonical_url', 'robots_meta', 'reading_time']);
        });

        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn(['seo_title', 'seo_description', 'seo_keywords', 'focus_keyword', 'canonical_url', 'robots_meta']);
        });
    }
};
