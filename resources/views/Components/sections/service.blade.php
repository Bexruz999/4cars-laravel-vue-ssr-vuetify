<div class="service">
    <div class="container">
        <div class="service-title text-center">Мы предлагаем вам<br/><b>лучший</b> сервис</div>
        <div class="d-flex justify-content-center">
            <collback btn_class="intro-content__btn collback2" title="Связаться с нами"></collback>
        </div>
        <br>
        <br>
        <br>
        <div class="row justify-content-between">
            @foreach($services as $service)
                <div class="col-12 col-md-6 col-lg-5 service-item d-flex align-items-top">
                    <img class="service-item__img" src="{{ asset(Voyager::image($service->image)) }}" alt="{{$service->title }}"/>
                    <div class="service-item__text">
                        <h6>{{ $service->title }}</h6>
                        <p>{!! $service->text !!}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
