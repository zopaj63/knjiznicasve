<h1>Detalj posudbe</h1>

<p>Član: {{$posudba->clan->ime}} {{$posudba->clan->prezime}}</p>
<p>Knjiga: {{$posudba->knjiga->naziv}} {{$posudba->knjiga->autor}}</p>
<p>Datum posudbe: {{$posudba->datum_posudbe}}</p>
<p>Datum vraćanja: {{$posudba->datum_vracanja ?? 'Nije još vraćeno'}}</p>

<form action="{{route('posudbas.edit', $posudba->id)}}" method="GET" style="display: inline;">
    @csrf
    <button type="submit">Uredi</button>
</form>

<form action="{{route('posudbas.destroy', $posudba->id)}}" method="POST" style="display: inline;">
    @csrf
    @method("DELETE")
    <button type="submit">Obriši</button>
</form>

<a href="{{route('posudbas.index')}}">Popis posudbi</a>