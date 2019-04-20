<label class="{{ $class ? $class : null }}">
    <span>{{ $label ? $label : $select ? $select : 'ERRO' }}</span>
    {!! Form::select($select, $data ? $data : []) !!}
</label>