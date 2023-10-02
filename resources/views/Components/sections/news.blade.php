<div class="news">
    <div class="container">
        <div class="block-title">
            <div class="block-title__line"></div>
            <div class="block-title__text">Наши <b>Статьи</b></div>
        </div>
        <!-- /title -->
        <div class="row d-flex justify-content-evenly news-container">
            @foreach($news as $new)
                @if(($loop->iteration % 2) === 0)
                    <div class="col-lg-{{ ($loop->iteration%4===0) ? '5' : '6' }} news-container__item" style="background-image: url('{{ asset(Voyager::image($new->image)) }}');">
                        <a class="" href="news/{{$new->id}}" ><h4>{{ $new->title }}</h4><p>{{ $new->short_desc }}</p></a>
                    </div>
                @endif

                @if(($loop->iteration % 2) === 1)
                        <div class="col-lg-{{ ($loop->iteration%4===1) ? '5' : '6' }} news-container__item" style="background-image: url('{{ asset(Voyager::image($new->image)) }}')">
                            <a href="news/{{$new->id}}" ><h4>{{ $new->title }}</h4><p>{{ $new->short_desc }}</p></a>
                        </div>
                @endif
            @endforeach
        </div>
        <br>
        <a href="/news-page" class="body-btn"> Подробнее </a>
    </div>
    <!-- container -->
</div>
