<div class="contacts">
    <div class="container">
        <div class="contacts-container">

            @foreach($contacts as $contact)
                <a target="_blank" href="{{ $contact->link }}" class="contacts-container__item">
                    <img src="{{ Voyager::image($contact->image) }}" alt="">
                    <h6>{{ $contact->title }}</h6><span>{!! $contact->text !!}</span>
                </a>
            @endforeach

        </div>
    </div>
</div>
