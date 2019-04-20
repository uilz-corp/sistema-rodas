<label class="{{ isset($class) ? $class : null }} input">
    <span>{{ isset($label) ? $label : ''}}</span>
    {!! Form::email($input, isset($value) ? $isset(value) : null, isset($attributes) ? $attributes : null) !!}
</label>