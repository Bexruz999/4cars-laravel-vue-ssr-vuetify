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

            {{-- dostavka --}}
            <div class="tab">
                <h4>Подтвердите ваш заказ :</h4>
                <br>

                <div class="row">

                    <div class="col-6">

                        <div class="payment-confirm">

                            <div class="payment-confirm-head">Покупатель</div>

                            <div class="payment-confirm-content">

                                <p><b>test test</b></p>

                                <p><b>E-mail:</b> 6so7a48mx@mozmail.com</p>
                                <p><b>Телефон:</b> 68742678/719</p>

                                <p><b>Оплата</b></p>

                                <p>Способ оплаты: KKB</p>
                            </div>
                        </div>

                    </div>

                    <div class="col-6">

                        <div class="payment-confirm">

                            <div class="payment-confirm-head">Адрес пункта выдачи</div>

                            <div class="payment-confirm-content">

                                <br>
                                <br>

                                <p>ул. Казыбаева, 270а Алматы, 050000 Kazakhstan</p>

                                <p><b>Доставка</b></p>

                                <p>Способ доставки: Пункт выдачи: г. Алматы </p>

                            </div>
                        </div>

                    </div>

                    <div class="col-8">
                        
                    </div>
                </div>

                <div class="basketbuttons">
                    <button class="header-contact__btn" type="button" id="nextBtn" onclick="nextPrev(1)">Оформить
                    </button>
                    <button class="header-contact__btn" type="button" id="prevBtn" onclick="nextPrev(-1)">Назад</button>
                </div>
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
                        <p><input name="name" placeholder="Имя:" oninput="this.className = ''"></p>
                        <p><input name="lastname" placeholder="Фамилия:" oninput="this.className = ''"></p>
                        <p><input name="phone" placeholder="Телефон:" oninput="this.className = ''"></p>
                        <p><input name="email" placeholder="E-mail:" oninput="this.className = ''"></p>
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
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                        <label class="form-check-label ml-4" for="flexRadioDefault1">
                            <b>KKB</b>
                            <p>Оплата при помощи платежных карт Visa, VisaElectron, MasterCard или Maestro. Прямо
                                сейчас.</p>
                        </label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2"
                               checked>
                        <label class="form-check-label ml-4" for="flexRadioDefault2">
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
