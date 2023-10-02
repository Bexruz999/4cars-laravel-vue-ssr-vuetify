<?php

namespace App\Services;

use App\Models\Group;
use App\Models\Product;
use App\Models\SiteMap;
use League\CommonMark\Extension\CommonMark\Node\Inline\Link;

class SiteMapService
{

    public $brands;

    public function __construct()
    {
        //$this->brands = StoreProducer::select(['id', 'status'])->where('status', 1)->get();
    }

    public function sitemap() {
        $sitemap = view('sitemaps.sitemap');
        return response($sitemap)->header('Content-Type', 'application/xhtml+xml');
    }

    public function products()
    {
        $products = Product::with('group')->get();
        //dd($products[0]);
        $products_map = view('sitemaps.product', ['products' => $products]);
        return response($products_map)->header('Content-Type', 'application/xhtml+xml');
    }

    public function categories()
    {
        $categories = Group::get();
        $categories_map = view('sitemaps.categories', ['categories' => $categories]);
        return response($categories_map)->header('Content-Type', 'application/xhtml+xml');
    }

    public function pages()
    {
        $brands_map = view('sitemaps.pages');
        return response($brands_map)->header('Content-Type', 'application/xhtml+xml');
    }

    public function links() {
        $links_chunk = Product::with(['group',])
            ->select(['id', 'group_number'])->get()->chunk(100);

        foreach ($links_chunk as $links) {
            $link = new SiteMap;
            $link->links = view('sitemaps.links', ['links' => $links]);
            $link->status = 'active';
            $link->save();
        }
    }
}
