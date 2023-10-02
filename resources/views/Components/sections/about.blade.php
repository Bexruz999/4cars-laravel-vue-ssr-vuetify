<div class="about">
    <div class="container">
        <div class="block-title">
            <div class="block-title__line"></div>
            <div class="block-title__text">Почему <b>мы?</b></div>
        </div>
        <div class="row about-stats align-items-center">
            <div class="col-12 col-md-6 col-lg-6 about-stats__item">
                <span>1.</span>
                Цена металлопроката в нашем магазине рыночная. Реализуем продукцию по доступным ценам за счет прямых поставок.
            </div>
            <div class="col-12 col-md-6 col-lg-6 about-stats__item">
                <span>2.</span>
                Даем гарантию качества от официальных представителей на все товары в ассортименте. У нас надежный металлопрокат.
            </div>
            <div class="col-12 col-md-6 col-lg-6 about-stats__item">
                <span>3.</span>
                Находим индивидуальный подход ко всем клиентам, компетентно консультируем, помогаем подобрать продукт под ваши задачи.
            </div>
            <div class="col-12 col-md-6 col-lg-6 about-stats__item">
                <span>4.</span>
                Создаем комфортные условия совершения покупки. Бесплатно доставляем товар транспортной компанией после его оплаты.
            </div>
        </div>
    </div>
    <div class="container-fluid" style="background-image: url({{ asset(Voyager::image($about->image)) }});">
        <div class="container pt-5 pb-5">
            <div class="row about-content">
                <div class="col-12 col-lg-8 about-content__text">
                    <h2>{{ $about->title }}</h2>
                    {!! $about->text !!}
                </div>
            </div>
        </div>
    </div>
</div>
