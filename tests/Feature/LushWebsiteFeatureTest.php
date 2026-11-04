<?php

namespace Tests\Feature;

use App\Models\Article;
use App\Models\Product;
use App\Models\User;
use Database\Seeders\LushDatabaseSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LushWebsiteFeatureTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed(LushDatabaseSeeder::class);
    }

    public function test_home_page_is_accessible(): void
    {
        $response = $this->get(route('home'));
        $response->assertStatus(200);
        $response->assertSee('LushSoftware');
        $response->assertSee('Lush Marketing Pro');
    }

    public function test_products_catalog_and_detail_are_accessible(): void
    {
        $response = $this->get(route('products.index'));
        $response->assertStatus(200);
        $response->assertSee('Lush Marketing Pro');

        $product = Product::where('slug', 'lush-marketing-pro')->first();
        $this->assertNotNull($product);

        $detailResponse = $this->get(route('products.show', $product->slug));
        $detailResponse->assertStatus(200);
        $detailResponse->assertSee($product->name);
    }

    public function test_solutions_and_pricing_pages_are_accessible(): void
    {
        $this->get(route('solutions.index'))->assertStatus(200)->assertSee('Tự Động Hóa Marketing');
        $this->get(route('pricing.index'))->assertStatus(200)->assertSee('Lush Marketing Pro');
    }

    public function test_articles_index_and_detail_are_accessible(): void
    {
        $response = $this->get(route('articles.index'));
        $response->assertStatus(200);

        $article = Article::first();
        $this->assertNotNull($article);

        $this->get(route('articles.show', $article->slug))
            ->assertStatus(200)
            ->assertSee($article->title);
    }

    public function test_about_and_contact_pages_are_accessible(): void
    {
        $this->get(route('about'))->assertStatus(200)->assertSee('Tầm Nhìn Chiến Lược');
        $this->get(route('contact'))->assertStatus(200)->assertSee('1900 886 996');
    }

    public function test_contact_form_submission_creates_record(): void
    {
        $payload = [
            'name' => 'Công Ty Công Nghệ An Khang',
            'email' => 'ankhang@tech.vn',
            'phone' => '0988776655',
            'company' => 'An Khang Tech',
            'product_interest' => 'lush-crm-enterprise',
            'message' => 'Chúng tôi cần tư vấn phần mềm CRM cho chuỗi 15 chi nhánh bán buôn.',
        ];

        $response = $this->post(route('contact.submit'), $payload);
        $response->assertRedirect();
        $response->assertSessionHas('success');

        $this->assertDatabaseHas('contact_messages', [
            'email' => 'ankhang@tech.vn',
            'product_interest' => 'lush-crm-enterprise',
        ]);
    }

    public function test_language_switcher_updates_locale(): void
    {
        $response = $this->get(route('locale.switch', 'en'));
        $response->assertRedirect();
        $response->assertSessionHas('locale', 'en');
        $response->assertCookie('locale', 'en');

        $responseZh = $this->get(route('locale.switch', 'zh'));
        $responseZh->assertRedirect();
        $responseZh->assertSessionHas('locale', 'zh');

        $responseKo = $this->get(route('locale.switch', 'ko'));
        $responseKo->assertRedirect();
        $responseKo->assertSessionHas('locale', 'ko');
    }

    public function test_admin_can_login_via_lush_admin(): void
    {
        $admin = User::where('role', 'admin')->first();

        // Guest cannot access admin dashboard -> redirected to /lush-admin
        $response = $this->get(route('admin.dashboard'));
        $response->assertRedirect(route('admin.login'));

        // Admin login via /lush-admin
        $loginResponse = $this->post(route('admin.login'), [
            'email' => $admin->email,
            'password' => 'Lush@Admin2026!',
        ]);
        $loginResponse->assertRedirect(route('admin.dashboard'));
        $this->assertAuthenticatedAs($admin);

        // Admin logout redirects to /lush-admin
        $this->post(route('logout'))->assertRedirect(route('admin.login'));
        $this->assertGuest();
    }

    public function test_guest_cannot_access_admin_dashboard(): void
    {
        $response = $this->get(route('admin.dashboard'));
        $response->assertRedirect(route('admin.login'));
    }

    public function test_regular_user_cannot_access_admin_dashboard(): void
    {
        $user = User::where('role', 'user')->first();
        $response = $this->actingAs($user)->get(route('admin.dashboard'));
        $response->assertStatus(403);
    }

    public function test_admin_can_access_dashboard_and_manage_resources(): void
    {
        $admin = User::where('role', 'admin')->first();
        $this->assertNotNull($admin);

        // Access dashboard
        $this->actingAs($admin)->get(route('admin.dashboard'))->assertStatus(200);

        // Access product list
        $this->actingAs($admin)->get(route('admin.products.index'))->assertStatus(200);

        // Access customer list
        $this->actingAs($admin)->get(route('admin.customers.index'))->assertStatus(200);

        // Access contact list
        $this->actingAs($admin)->get(route('admin.contacts.index'))->assertStatus(200);

        // Access settings
        $this->actingAs($admin)->get(route('admin.settings.index'))->assertStatus(200);

        // Access translations
        $this->actingAs($admin)->get(route('admin.translations.index'))->assertStatus(200);

        // Access extended CRUDs: testimonials, partners, categories, activity logs
        $this->actingAs($admin)->get(route('admin.testimonials.index'))->assertStatus(200);
        $this->actingAs($admin)->get(route('admin.partners.index'))->assertStatus(200);
        $this->actingAs($admin)->get(route('admin.product-categories.index'))->assertStatus(200);
        $this->actingAs($admin)->get(route('admin.article-categories.index'))->assertStatus(200);
        $this->actingAs($admin)->get(route('admin.activity-logs.index'))->assertStatus(200);

        // Test contacts CSV stream export
        $exportResponse = $this->actingAs($admin)->get(route('admin.contacts.export'));
        $exportResponse->assertStatus(200);
        $this->assertStringContainsString('text/csv', (string) $exportResponse->headers->get('content-type'));

        // Test clear cache action
        $cacheResponse = $this->actingAs($admin)->post(route('admin.settings.clear-cache'));
        $cacheResponse->assertRedirect();
        $cacheResponse->assertSessionHas('success');
    }

    public function test_downloads_page_and_sitemap_are_accessible(): void
    {
        $downloadResponse = $this->get(route('downloads.index'));
        $downloadResponse->assertStatus(200);
        $downloadResponse->assertSee('Trung Tâm Tải Phần Mềm');
        $downloadResponse->assertSee('Lush Marketing Pro');

        $sitemapResponse = $this->get(route('sitemap'));
        $sitemapResponse->assertStatus(200);
        $this->assertStringContainsString('text/xml', (string) $sitemapResponse->headers->get('content-type'));
        $sitemapResponse->assertSee('urlset');
    }

    public function test_security_headers_are_attached_to_responses(): void
    {
        $response = $this->get(route('home'));
        $response->assertStatus(200);
        $response->assertHeader('X-Content-Type-Options', 'nosniff');
        $response->assertHeader('X-Frame-Options', 'SAMEORIGIN');
        $response->assertHeader('X-XSS-Protection', '1; mode=block');
        $response->assertHeader('Referrer-Policy', 'strict-origin-when-cross-origin');
    }

    public function test_live_search_api_returns_json_results(): void
    {
        $response = $this->getJson(route('api.search', ['q' => 'Marketing']));
        $response->assertStatus(200);
        $response->assertJsonStructure([
            'success',
            'query',
            'data' => [
                'products',
                'articles',
            ],
        ]);
        $response->assertJsonFragment(['title' => 'Lush Marketing Pro']);
    }

    public function test_contact_form_validates_required_fields(): void
    {
        $response = $this->post(route('contact.submit'), []);
        $response->assertSessionHasErrors(['name', 'email', 'phone']);
    }

    public function test_admin_can_access_media_library(): void
    {
        $admin = User::where('role', 'admin')->first();
        $this->actingAs($admin)->get(route('admin.media.index'))->assertStatus(200);
    }

    public function test_rbac_user_roles_evaluation(): void
    {
        $admin = User::where('role', 'admin')->first();
        $this->assertTrue($admin->isAdmin());
        $this->assertTrue($admin->canAccessAdmin());

        $user = User::where('role', 'user')->first();
        $this->assertFalse($user->isAdmin());
        $this->assertFalse($user->canAccessAdmin());
    }
}
