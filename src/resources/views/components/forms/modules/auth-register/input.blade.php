@error($name)
<span>{{ $message }}</span>
@enderror
<div class="input-box">
    <input type="{{ $type }}" name="{{ $name }}" @class(['auth-invalid' => $errors->has($name)])
    placeholder="{{ $placeholder }}" value="{{ old($name) }}" @required($required)>
</div>
