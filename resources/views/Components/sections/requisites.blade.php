<div class="requisites">
    <div class="container-lg">
        <h3 class="requisites-title mb-lg-5 mb-3 mt-5">Реквизиты</h3>
        @foreach($requisites as $requisite)
            <p class="mb-lg-4 mb-2"><b>{{ $requisite->title }}</b>{{ $requisite->text }}</p>
        @endforeach
    </div>
</div>
