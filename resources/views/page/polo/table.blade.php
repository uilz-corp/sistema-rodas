<thead class="text-light">
    <tr>
    <th>#</th>
    <th>Descrição</th>
    <th>Tipo</th>
    </tr>
</thead>
<tbody>
    @foreach($data as $d)
    <tr id="{{ $d->id }}" class="clickable-row" onclick="getData(event)">
        <td>{{ $d->iteration }}</td>
        <td>{{ $d->descricao }}</td>
        <td>{{ $d->tipo_polo }}</td>
    </tr>
    @endforeach
</tbody>
