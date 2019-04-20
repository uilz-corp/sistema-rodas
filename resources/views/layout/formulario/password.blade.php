<label class="{{ isset($class) ? $class : null }} input">
    <span>{{ isset($label) ? $label : ''}}</span>
    {!! Form::password($input, $attributes) !!}
</label>