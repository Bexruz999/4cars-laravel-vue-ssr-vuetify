@extends('layouts.app')

@section('content')
    <div class="decor-1">
        <div class="blog">
            <div class="container-lg">
                <div class="row">
                    <div class="col-lg-7 col-12">
                        <a href="#" class="blog-aside mb-lg-5  mb-3">
                            <img src="{{ Voyager::image($blog->image) }}" class="mb-lg-5 mb-3">
                            <div class="blog-date mb-lg-3  mb-2">02 НОЯ 2020</div>
                            <h4 class="blog-title mb-lg-3  mb-2">{{ $blog->Title }}</h4>
                            <p class="blog-text">{!! $blog->Body !!}</p>
                        </a>
                    </div>
                    <div class="col-lg-5 col-12">
                        @foreach($blogs as $item)
                            <a href="/blog/{{ $item->Id }}" class="blog-item">
                                <img src="{{ Voyager::image($item->image) }}" class="mb-lg-7 mb-2">
                                <div class="pl-2 pr-2">
                                    <div class="blog-date mb-lg-3  mb-2">02 НОЯ 2020</div>
                                    <h4 class="blog-title mb-lg-3  mb-2">{{ $item->Title }}</h4>
                                    <p>{{ $item->short_desc }}</p>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
