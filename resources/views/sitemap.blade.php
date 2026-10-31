{!! '<' . '?xml version="1.0" encoding="UTF-8"?' . '>' !!}
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"
        xmlns:xhtml="http://www.w3.org/1999/xhtml"
        xmlns:image="http://www.google.com/schemas/sitemap-image/1.1">
    @foreach($staticRoutes as $route)
        <url>
            <loc>{{ $route }}</loc>
            <changefreq>daily</changefreq>
            <priority>{{ $route === route('home') ? '1.0' : '0.9' }}</priority>
            <xhtml:link rel="alternate" hreflang="vi" href="{{ $route }}?lang=vi" />
            <xhtml:link rel="alternate" hreflang="en" href="{{ $route }}?lang=en" />
            <xhtml:link rel="alternate" hreflang="zh" href="{{ $route }}?lang=zh" />
            <xhtml:link rel="alternate" hreflang="ko" href="{{ $route }}?lang=ko" />
        </url>
    @endforeach

    @foreach($products as $prod)
        <url>
            <loc>{{ route('products.show', $prod->slug) }}</loc>
            <lastmod>{{ $prod->updated_at->toAtomString() }}</lastmod>
            <changefreq>weekly</changefreq>
            <priority>0.95</priority>
            <xhtml:link rel="alternate" hreflang="vi" href="{{ route('products.show', $prod->slug) }}?lang=vi" />
            <xhtml:link rel="alternate" hreflang="en" href="{{ route('products.show', $prod->slug) }}?lang=en" />
            <xhtml:link rel="alternate" hreflang="zh" href="{{ route('products.show', $prod->slug) }}?lang=zh" />
            <xhtml:link rel="alternate" hreflang="ko" href="{{ route('products.show', $prod->slug) }}?lang=ko" />
            @if($prod->banner_url)
                <image:image>
                    <image:loc>{{ $prod->banner_url }}</image:loc>
                    <image:title>{{ $prod->name }}</image:title>
                    <image:caption>{{ $prod->tagline ?? $prod->name }}</image:caption>
                </image:image>
            @endif
        </url>
    @endforeach

    @foreach($articles as $art)
        <url>
            <loc>{{ route('articles.show', $art->slug) }}</loc>
            <lastmod>{{ ($art->published_at ?? $art->updated_at)->toAtomString() }}</lastmod>
            <changefreq>weekly</changefreq>
            <priority>0.85</priority>
            <xhtml:link rel="alternate" hreflang="vi" href="{{ route('articles.show', $art->slug) }}?lang=vi" />
            <xhtml:link rel="alternate" hreflang="en" href="{{ route('articles.show', $art->slug) }}?lang=en" />
            <xhtml:link rel="alternate" hreflang="zh" href="{{ route('articles.show', $art->slug) }}?lang=zh" />
            <xhtml:link rel="alternate" hreflang="ko" href="{{ route('articles.show', $art->slug) }}?lang=ko" />
            @if($art->thumbnail)
                <image:image>
                    <image:loc>{{ asset('storage/' . $art->thumbnail) }}</image:loc>
                    <image:title>{{ $art->title }}</image:title>
                    <image:caption>{{ $art->excerpt ?? $art->title }}</image:caption>
                </image:image>
            @endif
        </url>
    @endforeach
</urlset>
