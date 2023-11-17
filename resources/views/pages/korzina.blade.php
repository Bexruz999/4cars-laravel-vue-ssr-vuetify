<div class="decor-1">

    <div class="container">
        <form id="regForm" action="">

            <!-- Circles which indicates the steps of the form: -->
            <div style="text-align:center;margin-top:40px;">
                <span class="step"></span>
                <span class="step"></span>
                <span class="step"></span>
                <span class="step"></span>
            </div>

            <!-- One "tab" for each step in the form: -->
            <div class="tab">
                <x-sections.basket/>
                <div class="basketbuttons">
                    <button class="header-contact__btn" type="button" id="nextBtn" onclick="nextPrev(1)">ОФОРМИТЬ ЗАКАЗ</button>
                </div>
            </div>
            {{--<div class="tab">Name:
                <p><input placeholder="First name..." oninput="this.className = ''"></p>
                <p><input placeholder="Last name..." oninput="this.className = ''"></p>
            </div>--}}

            <div class="tab">Contact Info:
                <p><input placeholder="E-mail..." oninput="this.className = ''"></p>
                <p><input placeholder="Phone..." oninput="this.className = ''"></p>
                <div class="basketbuttons">
                    <button class="header-contact__btn" type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
                    <button class="header-contact__btn" type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
                </div>
            </div>

            <div class="tab">Birthday:
                <p><input placeholder="dd" oninput="this.className = ''"></p>
                <p><input placeholder="mm" oninput="this.className = ''"></p>
                <p><input placeholder="yyyy" oninput="this.className = ''"></p>
                <div class="basketbuttons">
                    <button class="header-contact__btn" type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
                    <button class="header-contact__btn" type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
                </div>
            </div>

            <div class="tab">Login Info:
                <p><input placeholder="Username..." oninput="this.className = ''"></p>
                <p><input placeholder="Password..." oninput="this.className = ''"></p>
            </div>

            <div style="overflow:auto;">
                {{-- <div style="color: white; display: flex; width: 100%; justify-content: space-between; flex-direction: row-reverse">
                     <button class="header-contact__btn" type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
                     <button class="header-contact__btn" type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
                 </div>--}}
            </div>

        </form>
    </div>
</div>
