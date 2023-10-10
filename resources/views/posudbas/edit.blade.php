<h1>Uredi posudbu</h1>
<hr>

<form action="{{route('posudbas.update', $posudba->id)}}" method="POST">
@csrf
@method("PUT") 

    <label>Član</label>
    <select name="id_clan" required>
        @foreach($clanovi as $clan)
            <option value="{{$clan->id}}" {{$clan->id==$posudba->id_clan?'selected':''}}>{{$clan->ime}} {{$clan->prezime}}</option>
        @endforeach
    </select>
    <br>
    <label>Knjiga</label>
    <select name="id_knjiga" required>
        @foreach($knjige as $knjiga)
            <option value="{{$knjiga->id}}" {{$knjiga->id==$posudba->id_knjiga?'selected':''}}>{{$knjiga->naziv}}</option>
        @endforeach
    </select>
    <br>
    <label>Datum posudbe</label>
    <input type="date" name="datum_posudbe" value="{{$posudba->datum_posudbe}}" required>
    <br>
    <label>Datum vraćanja</label>
    <input type="date" name="datum_vracanja" value="{{$posudba->datum_vracanja}}">
    // ostale opcije:



    
    <button type="submit">Ažuriraj</button>

</form>