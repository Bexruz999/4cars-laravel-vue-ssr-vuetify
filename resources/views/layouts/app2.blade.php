<!DOCTYPE html>
<html lang="ru">
@php
    /*$metas = \App\Models\MetaTeg::where('status', 'active')->get();
    $images = \App\Models\Element::where('status', 'active')->whereIn('position', ['catalog-bg'])->get();
    $uri = !empty(Illuminate\Support\Facades\Route::current()) ? Illuminate\Support\Facades\Route::current()->uri : false;
    $urls = ['about', 'catalog', 'news-page', 'contact-page', 'review-page', '/'];*/
    $menu = \App\Models\SiteMenu::where('active', 1)->get();
    $page = \App\Models\Page::where('slug', request()->path())->first();
@endphp
<x-head></x-head>


<body>
<div class="dyn-content">
    <x-header :menus="$menu" :page="$page"></x-header>
    <router-view></router-view>
    <div id="content">
        @yield('content')
    </div>
</div>
<x-form></x-form>
<x-footer></x-footer>
<x-scripts></x-scripts>
</body>
</html>
