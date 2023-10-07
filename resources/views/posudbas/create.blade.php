<h1>Posudi knjigu</h1>
<hr>

<form action="{{route('posudbas.store')}}" method="POST">
@csrf

    <label>Član</label>
    <select name="id_clan" required>
        @foreach($clanovi as $clan)
            <option value="{{$clan->id}}">{{$clan->ime}} {{$clan->prezime}}</option>
        @endforeach
    </select>
    <br>
    <label>Knjiga</label>
    <select name="id_knjiga" required>
        @foreach($knjige as $knjiga)
            <option value="{{$knjiga->id}}">{{$knjiga->naziv}}</option>
        @endforeach
    </select>
    <br>
    <label>Datum posudbe</label>
    <input type="date" name="datum_posudbe" required>
    <br>
    <button type="submit">Posudi</button>
</form>