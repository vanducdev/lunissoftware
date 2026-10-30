{!! '<' . '?xml version="1.0" encoding="UTF-8"?' . '>' !!}
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xhtml="http://www.w3.org/1999/xhtml">
    @foreach($staticRoutes as $route)
        <url>
            <loc>{{ $route }}</loc>
            <changefreq>daily</changefreq>
            <priority>0.9</priority>
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
            <priority>1.0</priority>
            <xhtml:link rel="alternate" hreflang="vi" href="{{ route('products.show', $prod->slug) }}?lang=vi" />
            <xhtml:link rel="alternate" hreflang="en" href="{{ route('products.show', $prod->slug) }}?lang=en" />
            <xhtml:link rel="alternate" hreflang="zh" href="{{ route('products.show', $prod->slug) }}?lang=zh" />
            <xhtml:link rel="alternate" hreflang="ko" href="{{ route('products.show', $prod->slug) }}?lang=ko" />
        </url>
    @endforeach

    @foreach($articles as $art)
        <url>
            <loc>{{ route('articles.show', $art->slug) }}</loc>
            <lastmod>{{ ($art->published_at ?? $art->updated_at)->toAtomString() }}</lastmod>
            <changefreq>weekly</changefreq>
            <priority>0.8</priority>
            <xhtml:link rel="alternate" hreflang="vi" href="{{ route('articles.show', $art->slug) }}?lang=vi" />
            <xhtml:link rel="alternate" hreflang="en" href="{{ route('articles.show', $art->slug) }}?lang=en" />
            <xhtml:link rel="alternate" hreflang="zh" href="{{ route('articles.show', $art->slug) }}?lang=zh" />
            <xhtml:link rel="alternate" hreflang="ko" href="{{ route('articles.show', $art->slug) }}?lang=ko" />
        </url>
    @endforeach
</urlset>

