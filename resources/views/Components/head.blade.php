<head>
    <x-meta>@yield('metas')</x-meta>
    <x-styles>@yield('styles')</x-styles>
      {{--@foreach($metas->where('position', 'head') as $head)
          {!! (request()->path() === $head->slug || $head->all_pages) ? $head->code : '' !!}
      @endforeach--}}
</head>
