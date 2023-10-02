<sitemapindex>
    @foreach($products as $product)
        <sitemap>
            <loc>{{ env('APP_URL') }}/store/{{ $product->group->slug }}/{{ $product->id }}</loc>

            <lastmod>{{ setting('admin.lastmode') }}</lastmod>

            <changefreq>monthly</changefreq>

            <priority>0.8</priority>
        </sitemap>
    @endforeach
</sitemapindex>
