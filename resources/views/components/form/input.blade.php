<div class="form-group">
    <label>{{ isset($title) ? $title : '' }}</label>
    <input type="{{ isset($type) ? $type : 'text' }}" name="{{ isset($name) ? $name : '' }}"
        class="
            form-control
            {{ isset($name) && $errors->has($name) ? 'is-invalid' : '' }}
        "
        placeholder="{{ isset($title) ? $title : '' }}"
        value="{{ isset($value) ? $value : '' }}"
        id="{{ isset($id) ? $id : '' }}" {{ isset($id) ? "accept=image/" : ''   }}
        onchange="loadFile(event)">

    @if (isset($name) && $errors->has($name))
        <span class="error invalid-feedback">{{ $errors->first($name) }}</span>
    @endif
</div>
