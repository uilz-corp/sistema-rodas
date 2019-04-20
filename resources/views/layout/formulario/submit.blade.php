<label class="{{ isset($class) ? $class : null }} submit">
    {!! Form::submit($input, isset($attributes) ? $attributes : null) !!}
</label>