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

    public function test_user_can_register_and_login(): void
    {
        $registerPayload = [
            'name' => 'Khách Hàng Mới',
            'email' => 'newuser@lush.vn',
            'phone' => '0911223344',
            'password' => 'Secret123!',
            'password_confirmation' => 'Secret123!',
        ];

        $response = $this->post(route('register'), $registerPayload);
        $response->assertRedirect(route('profile'));
        $this->assertAuthenticated();

        $this->post(route('logout'))->assertRedirect(route('home'));
        $this->assertGuest();

        $loginResponse = $this->post(route('login'), [
            'email' => 'newuser@lush.vn',
            'password' => 'Secret123!',
        ]);
        $loginResponse->assertRedirect(route('profile'));
        $this->assertAuthenticated();
    }

    public function test_guest_cannot_access_admin_dashboard(): void
    {
        $response = $this->get(route('admin.dashboard'));
        $response->assertRedirect(route('login'));
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
    }
}
