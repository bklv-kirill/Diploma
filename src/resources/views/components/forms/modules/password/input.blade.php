<div class="edit-password-input">
    <h3>{{ $title }}</h3>
    @error($name)
    <span>{{ $message }}</span>
    @enderror
    <input type="{{ $type }}" name="{{ $name }}" placeholder="{{ $placeholder }}" @required($required)>
</div>
