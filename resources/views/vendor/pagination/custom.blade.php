@if ($paginator->hasPages())
    <nav class="catalog-products__pagination">
        @if ($paginator->onFirstPage())
            <a class="catalog-products__pagination-item left-arrow disabled">&lsaquo;</a>
        @else
            <a class="catalog-products__pagination-item left-arrow" href="{{ $paginator->previousPageUrl() }}">&lsaquo;</a>
        @endif

        @foreach ($elements as $element)

                @if (is_string($element))
                    <a class="catalog-products__pagination-item" aria-disabled="true">{{ $element }}</a>
                @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <a class="catalog-products__pagination-item active" href="{{ $url }}">{{ $page }}</a>
                    @else
                        <a class="catalog-products__pagination-item" href="{{ $url }}">{{ $page }}</a>
                    @endif
                @endforeach
            @endif
        @endforeach

        @if ($paginator->hasMorePages())
            <a class="catalog-products__pagination-item right-arrow" href="{{ $paginator->nextPageUrl() }}">&rsaquo;</a>
        @else
            <a class="catalog-products__pagination-item right-arrow disabled" href="#">&rsaquo;</a>
        @endif
    </nav>
@endif
