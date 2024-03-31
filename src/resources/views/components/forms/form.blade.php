<form action='{{ $action }}' method='{{ $method === 'GET' ? 'GET' : 'POST'}}'>
    @if($method !== 'GET')
        @csrf
        @method($method)
    @endif

    {{ $slot }}
</form>
