
<thead class="text-light">
    <tr>
    <th>#</th>
    <th>Nome</th>
    <th>E-mail</th>
    <th>Perfil</th>
    </tr>
</thead>
<tbody>
    @foreach($data as $d)
    <tr id="{{ $d->id }}" class="clickable-row" onclick="getData(event)">
        <td>{{ $d->iteration }}</td>
        <td>{{ $d->nome }}</td>
        <td>{{ $d->email }}</td>
        <td>{{ $d->perfil }}</td>
    </tr>
    @endforeach
</tbody>