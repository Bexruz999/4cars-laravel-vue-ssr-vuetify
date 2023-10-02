@foreach($links as $link)
{{ env('APP_URL') }}/store/{{ $link->group->slug }}/{{ $link->id }}<br>
@endforeach
