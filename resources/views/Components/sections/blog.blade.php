<div class="introBlog">
    <div class="container-lg">
        <h2 class="black-title">Блог</h2>
        <div class="row justify-content-center">
            @foreach($blogs as $blog)
                <div class="col-md-6 col-12">
                    <div class="introBlog-cart">
                        <div class="introBlog-title">
                            <div class="introBlog-title__date">
                                02 Ноя 2020
                            </div>
                            <div class="introBlog-title__decor"></div>
                        </div>
                        <div class="introBlog-cart__inner">
                            <img class="introBlog-cart__img" src="{{ asset(Voyager::image($blog->image)) }}" alt="blog-img">
                            <div class="introBlog-cart__text"><p>{{ $blog->short_desc }}</p> </div>
                            <a href="/blog/{{ $blog->Id }}" class="introBlog-cart__btn">
                                <img src="{{ asset('assets/images/icons/blog-book.svg') }}" alt="{{ $blog->title }}">
                                <span>Читать дальше</span>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
