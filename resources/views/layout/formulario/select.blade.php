<label class="{{ isset($class) ? $class : null }} input">
    <span>{{ isset($label) ? $label : ''}}</span>
    {!! Form::select($select, isset($options) ? $options : null, isset($attributes) ? $attributes : null) !!}
</label>