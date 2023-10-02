<div class="callback" id="callbackLink">
    <div class="container">
        <div class="row d-flex justify-content-between align-items-center">
            <img class="col-12 col-md-7" src="{{ asset(Voyager::image($callback->image)) }}" alt=""/>
            <form action="/collback" method="post" id="forma" class="col-12 col-md-5 d-flex flex-column justify-content-between align-items-center">
                <h4 class="callback-form__title">
                    {!! $callback->text !!}
                </h4>
                @csrf
                <input name="first" type="text" class="callback-form__input" placeholder="Имя" required/>
                <formmask></formmask>
                <input type="submit" value="Отправить" class="callback-form__btn" placeholder="Телефон"/>
            </form>
        </div>
    </div>
</div>
