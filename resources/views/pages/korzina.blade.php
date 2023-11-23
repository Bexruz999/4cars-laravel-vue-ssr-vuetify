<div class="decor-1">

    <div class="container">
        <form id="regForm" action="/api/checkout" method="post">

            <!-- Circles which indicates the steps of the form: -->
            <div style="text-align:center;margin-top:40px;">
                <span class="step">
                    <img class="step-img" src="{{ asset('/assets/images/icons/shopping-cart-icon.svg') }}">
                </span>
                <span class="step">
                    <img class="step-img" src="{{ asset('/assets/images/icons/personal-information-icon.svg') }}">
                </span>
                <span class="step">
                    <img class="step-img" src="{{ asset('/assets/images/icons/truck-delivered-icon.svg') }}">
                </span>
                <span class="step">
                    <img class="step-img" src="{{ asset('/assets/images/icons/payment-method-svgrepo-com.svg') }}">
                </span>
                <span class="step">
                    <img class="step-img" src="{{ asset('/assets/images/icons/checklist-svgrepo-com.svg') }}">
                </span>
            </div>



            <!-- One "tab" for each step in the form: -->
            <div class="tab">
                <x-sections.basket/>
                <div class="basketbuttons">
                    <button class="header-contact__btn" type="button" id="nextBtn" onclick="nextPrev(1)">ОФОРМИТЬ
                        ЗАКАЗ
                    </button>
                </div>
            </div>

            {{-- dannie clienta --}}
            <div class="tab">

                <div class="basket-payment">
                    <h4>Данные клиента:</h4>

                    <div class="basket-form">
                        <p><input name="name" id="name" placeholder="Имя:" oninput="this.className = ''" value="{{ auth()->check() ? auth()->user()->name : '' }}"></p>
                        <p><input name="lastname" id="lastname" placeholder="Фамилия:" oninput="this.className = ''" value="{{ auth()->check() ? auth()->user()->last_name : '' }}"></p>
                        <p><input name="phone" id="phone" placeholder="Телефон:" oninput="this.className = ''" value="{{ auth()->check() ? auth()->user()->phone : '' }}"></p>
                        <p><input name="email" id="email" placeholder="E-mail:" oninput="this.className = ''" value="{{ auth()->check() ? auth()->user()->email : '' }}"></p>
                    </div>
                </div>

                <div class="basketbuttons">
                    <button class="header-contact__btn" type="button" id="nextBtn" onclick="nextPrev(1)">Далее</button>
                    <button class="header-contact__btn" type="button" id="prevBtn" onclick="nextPrev(-1)">Назад</button>
                </div>
            </div>

            {{-- dostavka ili sama vivoz --}}
            <div class="tab">
                <div class="basket-payment">
                    <h4>Доставка или самовывоз:</h4>
                    <br>
                    <br>
                    <br>
                    <br>
                    <p><input id="address" name="address" placeholder="Адрес" oninput="this.className = ''"></p>
                    <br>
                    <br>
                    <br>
                    <br>
                </div>
                <div class="basketbuttons">
                    <div class="d-flex">
                        <button class="header-contact__btn" type="button" id="nextBtn" onclick="addaddress(1)">
                            Самовывоз
                        </button>
                        <button class="header-contact__btn ml-5" type="button" id="nextBtn" onclick="nextPrev(1)">
                            Доставка
                        </button>
                    </div>
                    <button class="header-contact__btn" type="button" id="prevBtn" onclick="nextPrev(-1)">Назад</button>
                </div>
            </div>

            {{-- payment --}}
            <div class="tab">

                <div class="basket-payment">
                    <h4>Выберите способ оплаты:</h4>

                    <br>

                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="payment" id="payment_" value="KKB" checked>
                        <label class="form-check-label ml-4" for="payment_">
                            <b>KKB</b>
                            <p>Оплата при помощи платежных карт Visa, VisaElectron, MasterCard или Maestro. Прямо
                                сейчас.</p>
                        </label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="payment" id="payment" value="Оплата в магазине">
                        <label class="form-check-label ml-4" for="payment">
                            <b>Оплата в магазине</b>
                            <p>Оплата в кассу точки самовывоза</p>
                        </label>
                    </div>

                </div>

                <div class="basketbuttons">
                    <button class="header-contact__btn" type="button" id="nextBtn" onclick="nextPrev(1)">Далее</button>
                    <button class="header-contact__btn" type="button" id="prevBtn" onclick="nextPrev(-1)">Назад</button>
                </div>
            </div>


            {{-- podverjdeniya --}}
            <div class="tab">
                <h4>Подтвердите ваш заказ :</h4>
                <br>

                <div class="row">

                    <div class="col-6">

                        <div class="payment-confirm">

                            <div class="payment-confirm-head">Покупатель</div>

                            <div class="payment-confirm-content">

                                <p id="name2"><b>{{ auth()->check() ? auth()->user()->name : '' }}</b></p>

                                <p id="email2"><b>E-mail:</b> {{ auth()->check() ? auth()->user()->email : '' }}</p>
                                <p id="phone2"><b>Телефон:</b> {{ auth()->check() ? auth()->user()->phone : '' }}</p>

                                <p><b>Оплата</b></p>

                                <p id="payment2" >Способ оплаты: Оплата в магазине</p>
                            </div>
                        </div>

                    </div>

                    <div class="col-6">

                        <div class="payment-confirm">

                            <div class="payment-confirm-head">Адрес пункта выдачи</div>

                            <div class="payment-confirm-content">

                                <br>
                                <br>

                                <p id="address2"></p>

                                <p><b>Доставка</b></p>

                                <p>Способ доставки: Пункт выдачи: г.Алматы </p>

                            </div>
                        </div>

                    </div>

                </div>

                <br>
                <br>

                <div class="ml-3">
                    <x-sections.basket/>
                </div>

                <div class="basketbuttons">
                    <button class="header-contact__btn" type="button" id="nextBtn" onclick="nextPrev(1)">Оформить
                    </button>
                    <button class="header-contact__btn" type="button" id="prevBtn" onclick="nextPrev(-1)">Назад</button>
                </div>
            </div>

            {{-- podtverdit --}}
            {{--<div class="tab">
                Login Info:
                <p><input placeholder="Username..." oninput="this.className = ''"></p>
                <p><input placeholder="Password..." oninput="this.className = ''"></p>
            </div>--}}

            <div style="overflow:auto;">
                {{-- <div style="color: white; display: flex; width: 100%; justify-content: space-between; flex-direction: row-reverse">
                     <button class="header-contact__btn" type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
                     <button class="header-contact__btn" type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
                 </div>--}}
            </div>

        </form>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {

        var name = document.querySelector('#name'),
            phone = document.querySelector('#phone'),
            email = document.querySelector('#email'),
            payment = document.querySelector('#payment'),
            payment_ = document.querySelector('#payment_'),
            address = document.querySelector('#address'),
            name2 = document.querySelector('#name2'),
            phone2 = document.querySelector('#phone2'),
            email2 = document.querySelector('#email2'),
            payment2 = document.querySelector('#payment2'),
            address2 = document.querySelector('#address2')

        name.addEventListener('input', function () {
            console.log(name, name2.innerHTML = `<b>${name.value}</b>`);
        });

        phone.addEventListener('input', function () {
            console.log(phone, phone2.innerHTML = `<b>Телефон:</b> ${phone.value}`);
        });

        email.addEventListener('input', function () {
            console.log(email, email2.innerHTML = `<b>E-mail:</b> ${email.value}`);
        });

        payment.addEventListener('input', function () {
            console.log(payment, payment2.innerHTML = `Способ оплаты: ${payment.value}`);
        });

        payment_.addEventListener('input', function () {
            console.log(payment, payment2.innerHTML = `Способ оплаты: ${payment_.value}`);
        });

        address.addEventListener('input', function () {
            console.log(address, address2.innerHTML = address.value);
        });
    })
</script>
