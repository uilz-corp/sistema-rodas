<thead class="text-light">
    <tr>
    <th>#</th>
    <th>Descrição</th>
    </tr>
</thead>
<tbody>
    @foreach($data as $d)
    <tr id="{{ $d->id }}" class="clickable-row" onclick="getData(event)">
        <td>{{ $loop->iteration }}</td>
        <td>{{ $d->descricao }}</td>
    </tr>
    @endforeach
</tbody>
