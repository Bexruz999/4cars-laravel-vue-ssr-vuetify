<div class="footer">
    <div class="waves">
        <div class="wave" id="wave1"></div>
        <div class="wave" id="wave2"></div>
        <div class="wave" id="wave3"></div>
        <div class="wave" id="wave4"></div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-sm-3 col-6 justify-content-center d-flex">
                <div class="footer-links">
                    <h6 class="footer-links__title">
                        Информация
                    </h6>
                    <mymenu v-slot="scope">
                        @foreach($menus->where('position', 'Информация') as $menu)
                            <router-link to="{{ $menu->slug }}" @click.prevent="scope.btn('{{ $menu->slug }}')">{{ $menu->title }}</router-link>
                        @endforeach
                    </mymenu>
                </div>
            </div>
            <div class="col-sm-3 col-6 justify-content-center d-flex">
                <div class="footer-links">
                    <h6 class="footer-links__title">
                        Полезное
                    </h6>
                    <mymenu v-slot="scope">
                        @foreach($menus->where('position', 'Полезное') as $menu)
                            <router-link to="{{ $menu->slug }}" @click.prevent="scope.btn('{{ $menu->slug }}')">{{ $menu->title }}</router-link>
                        @endforeach
                    </mymenu>
                </div>
            </div>
            <div class="col-sm-3 col-6 justify-content-center d-flex">
                <div class="footer-links">
                    <h6 class="footer-links__title">
                        Сервис
                    </h6>
                    <mymenu v-slot="scope">
                        @foreach($menus->where('position', 'Сервис') as $menu)
                            <router-link to="{{ $menu->slug }}" @click.prevent="scope.btn('{{ $menu->slug }}')">{{ $menu->title }}</router-link>
                        @endforeach
                    </mymenu>
                </div>
            </div>
            <div class="col-sm-3 col-6 justify-content-center d-flex">
                <div class="footer-links">
                    <h6 class="footer-links__title">
                        Личный кабинет
                    </h6>
                    <mymenu v-slot="scope">
                        @foreach($menus->where('position', 'Личный кабинет') as $menu)
                            <router-link to="{{ $menu->slug }}" @click.prevent="scope.btn('{{ $menu->slug }}')">{{ $menu->title }}</router-link>
                        @endforeach
                    </mymenu>
                </div>
            </div>
        </div>
    </div>
    <mymenu v-slot="scope">
        <router-link to="/" @click.prevent="scope.btn('/')"><img class="footer-logo" src="{{ asset('assets/images/logo.svg') }}" alt="logo"/></router-link>
    </mymenu>

</div>
