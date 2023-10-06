<h1>Potvrda brisanja Člana</h1>
<p>Član: {{$clan->ime}} {{$clan->prezime}}</p>
<form action="{{route('clans.destroy', $clan->id)}}" method="POST">
    @csrf
    @method("DELETE")
    <button type="submit">Obriši</button>
</form>
<br>


<form action="{{route('clans.index')}}" method="GET">
    <button type="submit">Odustani</button>
</form>