@error($name)
<span>{{ $message }}</span>
@enderror
<div class="input-box">
    <input type="{{ $type }}" name="{{ $name }}" class="@error($name) auth-invalid @enderror"
           placeholder="{{ $placeholder }}" value="{{ old($name) }}" @required($required)>
</div>
