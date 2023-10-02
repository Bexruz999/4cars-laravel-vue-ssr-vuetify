<sitemapindex>
    <sitemap>
        <loc>{{ env('APP_URL') }}/sitemap-pages.xml</loc>

        <lastmod>{{ setting('admin.lastmode') }}</lastmod>

            <changefreq>monthly</changefreq>

            <priority>0.8</priority>
    </sitemap>
    <sitemap>
        <loc>{{ env('APP_URL') }}/sitemap-products.xml</loc>

        <lastmod>{{ setting('admin.lastmode') }}</lastmod>

            <changefreq>monthly</changefreq>

            <priority>0.8</priority>
    </sitemap>
    <sitemap>
        <loc>{{ env('APP_URL') }}/sitemap-categories.xml</loc>

        <lastmod>{{ setting('admin.lastmode') }}</lastmod>

            <changefreq>monthly</changefreq>

            <priority>0.8</priority>
    </sitemap>
</sitemapindex>
