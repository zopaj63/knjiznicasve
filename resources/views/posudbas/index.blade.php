<h1>Popis posudbi</h1>
<hr>

<a href="{{route('posudbas.create')}}">Posudi knjigu</a>
<br>

<table border="1">
    <thead>
        <tr>
            <th>Član</th>
            <th>Knjiga</th>
            <th>Datum posudbe</th>
            <th>Datum vraćanja</th>
            <th colspan="3">Akcija</th>
        </tr>
    </thead>

    <tbody>
        @foreach($posudbe as $posudba)
            <tr>
                <td>{{$posudba->clan->ime}} {{$posudba->clan->prezime}}</td>
                <td>{{$posudba->knjiga->naziv}}</td>
                <td>{{$posudba->datum_posudbe}}</td>
                <td>{{$posudba->datum_vracanja ?? 'Nije još vraćeno'}}</td> <!--coalesing operator, umjesto NULL piše poruku-->
                <td>
                    <form action="{{route('posudbas.show', $posudba->id)}}" method="GET" style="display: inline;">
                        @csrf
                        <button type="submit">Prikaži</button>
                    </form>
                </td>
                <td>
                    <form action="{{route('posudbas.edit', $posudba->id)}}" method="GET" style="display: inline;">
                        @csrf
                        <button type="submit">Uredi</button>
                    </form>
                </td>
                <td>
                    <form action="{{route('posudbas.destroy', $posudba->id)}}" method="POST" style="display: inline;">
                        @csrf
                        @method("DELETE")
                        <button type="submit">Obriši</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>