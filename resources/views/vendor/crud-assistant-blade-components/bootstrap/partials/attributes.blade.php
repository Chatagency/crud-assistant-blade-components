@if($attributes)
  @foreach($attributes as $key => $value)
   {{$key}} = "{{ $value }}"
  @endforeach
@endif