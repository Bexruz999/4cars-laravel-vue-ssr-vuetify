@extends('layouts.app')

@section('metas')
    <title>{{ $data['title'] }}</title>
    <meta name="description" content="{{ $data['description'] }}">
@endsection

@section('styles')
    <style>
        .categories_item {
            box-shadow: 0px 4px 4px 0px rgba(25, 25, 25, 0.25);
            display: flex;
            flex-direction: column;
            color: rgb(33, 37, 41);
            margin: 15px 0;
            padding: 10px;
            min-height: 320px;
            cursor: pointer;
        }

        .categories_item:hover {
            box-shadow: 0px 6px 6px 0px rgba(25, 25, 25, 0.35);
        }

        .catalog-img {
            width: 100%;
            height: 286px;
        }
    </style>
@endsection

@section('content')

    <div class="catalog">
        <div class="container">
            <h2>Наша продукция</h2>
            <br>
            <br>
            <div class="row">
                @foreach($categories as $category)
                    <div class="col-12 col-md-6 col-lg-3 ">
                        <a href="/category/{{ $category->slug }}" class="categories_item">
                            <img class="catalog-img" src="{{ asset(Voyager::image($category->img)) }}" alt="{{ $category->name }}"/>
                            <h5>{{ $category->name }}</h5>
                        </a>
                    </div>
                @endforeach
            </div>
            <br>
            <br>
            <!-- /row -->
            <div class="catalog-content">
                <h3 class="catalog-content__title">Качественный металлопрокат от ТОО «Металон 2017»</h3>
                <p class="catalog-content__text">
                    Компания, занимающаяся реализацией металлопрокатных изделий российского и казахстанского производства.
                </p>

                <p class="catalog-content__text">
                    Компания предлагает лучшее соотношение цены и качества, а также гарантию на всю продукцию. Широкий ассортимент металлопроката удовлетворит потребности любого производства. Торгово-складской комплекс (склад металла) находящийся рядом с Алматы всегда рад обслужить Вас. На нашем складе находится более 1000 позиций металлопроката и трубы разных видов и типоразмеров.
                </p>

                <p class="catalog-content__text">
                    Мы проделали большую работу и приобрели бесценный практический опыт и приумножили свои знания в области реализации металлопроката и оказания услуг по обработке металла, чтобы предоставить лучшие условия для наших клиентов.
                </p>
            </div>
        </div>
    </div>

@endsection
