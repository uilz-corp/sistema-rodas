<label class="{{ isset($class) ? $class : null }} input">
    <span>{{ isset($label) ? $label : ''}}</span>
    {!! Form::text($input, isset($value) ? $value : null, isset($attributes) ? $attributes : null) !!}
</label>