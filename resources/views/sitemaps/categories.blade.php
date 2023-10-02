<sitemapindex>
    @foreach($categories as $category)
        <sitemap>
            <loc>{{ env('APP_URL') }}/category/{{ $category->slug }}</loc>

            <lastmod>{{ setting('admin.lastmode') }}</lastmod>

            <changefreq>monthly</changefreq>

            <priority>0.8</priority>
        </sitemap>
    @endforeach
</sitemapindex>
