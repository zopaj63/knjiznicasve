<h2>Naziv: {{$knjiga->naziv}}</h2>
<h3>Autor: {{$knjiga->autor}}</h3>
<h3>Godina izdanja: {{$knjiga->godina_izdanja}}</h3>
<h4>Upisano: {{$knjiga->created_at->format("M-Y")}}</h4>

<form action="{{route('knjigas.edit', $knjiga->id)}}" method="GET" style="display: inline;">
@csrf
<button type="submit">Uredi</button>
</form>

<form action="{{route('knjigas.destroy', $knjiga->id)}}" method="POST" style="display: inline;">
@csrf
@method('DELETE')
<button type="submit">Obriši</button>
</form>

<br><br>
<a href="{{route('knjigas.index')}}">Povratak na popis knjiga</a>