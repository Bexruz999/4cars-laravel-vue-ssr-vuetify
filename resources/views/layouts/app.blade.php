<!DOCTYPE html>
<html lang="ru">
{{--@php
    $metas = \App\Models\MetaTeg::where('status', 'active')->get();
    $images = \App\Models\Element::where('status', 'active')->whereIn('position', ['catalog-bg'])->get();
    $uri = !empty(Illuminate\Support\Facades\Route::current()) ? Illuminate\Support\Facades\Route::current()->uri : false;
    $urls = ['about', 'catalog', 'news-page', 'contact-page', 'review-page', '/'];
 @endphp--}}
<x-head :metas="$metas"></x-head>
<body>
@foreach($metas->where('position', 'header') as $header)
    {!! (request()->path() === $header->slug || $header->all_pages) ? $header->code : '' !!}
@endforeach

<div class="wrap">
    <x-header>@yield('header')</x-header>
    @yield('content')
</div>
<x-footer></x-footer>

<x-collBack></x-collBack>
<x-scripts :metas="$metas"> @yield('scripts') </x-scripts>
@if(in_array($uri, $urls))
    <style>
        body {
            position: relative;
        }
        .catalog-bg{
            position: absolute;
            z-index: -1;
        }
    </style>

    <style>
        @foreach($images as $id => $image)
                #catalog-bg-{{$id}} { {!! $image->code !!} }
        @endforeach
    </style>

    @foreach($images as $id => $image)
        <img id="catalog-bg-{{$id}}" src="{{ asset(Voyager::image($image->image)) }}" class="catalog-bg"/>
    @endforeach
@endif
</body>
</html>
