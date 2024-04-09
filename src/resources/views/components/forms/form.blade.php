<form action='{{ $action }}' method='{{ $method === 'GET' ? 'GET' : 'POST'}}'
      @if($isMultipartFormData) enctype="multipart/form-data" @endif>
    @if($method !== 'GET')
        @csrf
        @method($method)
    @endif

    {{ $slot }}
</form>
