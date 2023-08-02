<div class="form-group">
    <label>{{ isset($title) ? $title : '' }}</label>

    <select name="{{ isset($name) ? $name : '' }}"
        class="
            form-control
            {{ isset($name) && $errors->has($name) ? 'is-invalid' : '' }}
        ">
        @foreach ($options as $option)
            <option {{ isset($value) && $value == $option->id ? 'selected' : '' }} value="{{ $option->id }}">{{ $option->name }}</option>
        @endforeach
    </select>
    @if (isset($name) && $errors->has($name))
        <span class="error invalid-feedback">{{ $errors->first($name) }}</span>
    @endif
</div>
