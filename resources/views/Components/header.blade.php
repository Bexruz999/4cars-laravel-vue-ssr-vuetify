<div id="intro" class="{{ request()->path() === '/' ? 'introMain' : 'introPages' }}" style="background-image: url({{ Voyager::image($page->image) }})">
    <div class="container">
        <header class="header">

            <div class="row justify-content-between">

                <mymenu v-slot="scope">
                    <router-link to="/" @click.prevent="scope.btn('/')" class="col-xl-2 header-logo"><img src="{{ asset('assets/images/logo.svg') }}" alt="logo"/></router-link>
                </mymenu>

                <div class="col-xl-7 col-12 header-contact">

                    <div class="header-contact__item">
                        <img src="{{ asset('assets/images/icons/phone-icon.png') }}" alt=""/>
                        <div class="header-contact__item-phones">
                            <a href="tel:+77017448007">+7 (701) 744-80-07</a>
                            <a href="tel:+77064133556">+7 (706) 413-35-56</a>
                        </div>
                    </div>

                    <div class="header-contact__item">
                        <img src="{{ asset('assets/images/icons/address-icon.png') }}" alt="г. Алматы ул. Казыбаева, 270а"/>
                        <a href="https://2gis.kz/almaty/firm/70000001040222127/76.914359%2C43.305155?m=76.91509%2C43.305034%2F18.43%2Fr%2F3.96" target="_blank">г. Алматы ул. <br/>Казыбаева, 270а</a>
                    </div>

                    <collback title="Заказать звонок" btn_class="header-contact__btn"></collback>
                </div>

                <div class="col-xl-3 col-12 header-buttons">
                    <a href="/admin">
                        <img src="{{ Voyager::image(setting('user.default-avatar')) }}" alt=""/>
                        <span>Личный кабинет</span>
                    </a>
                    <mymenu v-slot="scope">
                        <router-link to="/" @click.prevent="scope.btn('/')">
                            <img src="{{ asset('assets/images/icons/photo-icon.png') }}" alt=""/>
                            <span>Список желаний</span>
                        </router-link>
                        <router-link to="/" @click.prevent="scope.btn('/')">
                            <img src="{{ asset('assets/images/icons/photo-icon.png') }}" alt=""/>
                            <span>Корзина</span>
                            <span>0тг</span>
                            <span class="header-buttons__count">0</span>
                        </router-link>
                    </mymenu>
                </div>
            </div>

            <div class="row justify-content-around">
                <form action="#" class="col-xl-7 col-12 header-search">
                    <search placeholder="Найти"></search>
                    <button type="submit">
                        <img src="{{ asset('assets/images/icons/search-icon.png') }}" alt=""/>
                    </button>
                </form>
            </div>

            <mymenu v-slot="scope">
                <div class="row justify-content-center">
                    <nav class="col-lg-10 header-nav">
                        @foreach($menus as $menu)
                            <router-link to="{{ $menu->slug }}" @click.prevent="scope.btn('{{ $menu->slug }}')">{{ $menu->title }}</router-link>
                        @endforeach
                    </nav>
                </div>
            </mymenu>

        </header>


        <div class="header-mobile"><!-- .active-menu -->
            <div class="container">
                <div class="row">
                    <div class="col-sm-2 col-3 justify-content-center">
                        <div class="header-mobile__burger">
                            <div class="line line-1"></div>
                            <div class="line line-2"></div>
                            <div class="line line-3"></div>
                        </div>
                        <div class="header-mobile__burger-menu"><!-- .active-menu -->
                            <div class="burger-menu__links burger-menu__socials">
                                <a target="_blank" href="https://wa.me/+77064133556">
                                    <img src="{{ asset('assets/images/icons/whatsapp-icon.png') }}" alt="">
                                </a>
                                <a target="_blank" href="https://t.me/Focarkz_bot">
                                    <img src="{{ asset('assets/images/icons/telegram-icon.png') }}" alt="">
                                </a>
                                <a target="_blank" href="https://www.instagram.com/4carkz/">
                                    <img src="{{ asset('assets/images/icons/instagram-icon.png') }}" alt="">
                                </a>

                            </div>
                            <div class="burger-menu__links">
                                <a href="tel:+77017448007">+7 (701) 744-80-07</a>
                                <a href="tel:+77064133556">+7 (706) 413-35-56</a>
                            </div>
                            <div class="burger-menu__links">
                                <a href="#">Шины</a>
                                <a href="#">Диски</a>
                                <a href="#">Оплата и доставка</a>
                                <a href="#">Акции и скидки</a>
                                <a href="#">Контакты</a>
                                <a href="#">Шиномонтаж</a>
                            </div>
                            <div class="burger-menu__btns">
                                <a href="#">Личный кабинет</a>
                                <a href="#">Список желаний</a>
                                <a href="#">Корзина</a>
                            </div>

                        </div>
                    </div>
                    <div class="col-sm-1 col-1 d-flex header-mobile__search-dn justify-content-center align-items-center">
                        <img class="header-mobile__search" src="{{ asset('assets/images/icons/search-icon.png') }}" alt="">
                    </div>
                    <a href="#" class="col-sm-5 col-6 d-flex justify-content-center align-items-center">
                        <div class="header-mobile__logo">
                            <img src="{{ asset('assets/images/logo.svg') }}" alt="">
                        </div>
                    </a>
                    <div class="col-sm-4 col-5 header-mobile__btn-dn">
                        <div class="header-mobile__btn">
                            Заказать звонок
                        </div>
                    </div>
                    <a href="tel:+77017448007"
                       class=" col-sm-4 col-3 header-mobile__icon justify-content-center d-flex align-items-center">
                        <img src="{{ asset('assets/images/icons/phone-header.png') }}" alt="">
                    </a>
                </div>
            </div>
        </div>


        <h1 id="title" class="introMain-title">{!! $page->title !!}</h1>
        <div id="s404" style="display: none">
            <a class="intro-404-link text-lg-center" href="../index.html">Вернуться на главную страницу</a>
            <img class="intro-404-img" src="/assets/images/404.png" alt="">
        </div>
    </div>
</div>

