<h1>Potvrda brisanja Knjige</h1>
<p>Knjiga: {{$knjiga->naziv}} {{$knjiga->autor}} {{$knjiga->godina_izdanja}}</p>
<form action="{{route('knjigas.destroy', $knjiga->id)}}" method="POST">
    @csrf
    @method("DELETE")
    <button type="submit">Obriši</button>
</form>
<br>


<form action="{{route('knjigas.index')}}" method="GET">
    <button type="submit">Odustani</button>
</form>