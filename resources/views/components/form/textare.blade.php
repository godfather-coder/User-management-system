<div class="form-group">
    <label>{{ isset($title) ? $title : '' }}</label>
    <textarea name="{{ isset($name) ? $name : '' }}"
    oninput='this.style.height = "auto";this.style.height = this.scrollHeight + "px"'
        class="
            form-control
            {{ isset($name) && $errors->has($name) ? 'is-invalid' : '' }}
        "
        style=" overflow: hidden;"
        placeholder="{{ isset($title) ? $title : '' }}" value="{{ isset($value) ? $value : '' }}">
        {{ isset($value)? $value : '' }}</textarea>

    @if (isset($name) && $errors->has($name))
        <span class="error invalid-feedback">{{ $errors->first($name) }}</span>
    @endif
</div>
