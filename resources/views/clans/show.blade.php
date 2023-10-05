<h2>{{$clan->ime}} {{$clan->prezime}}</h2>
<h3>Članski broj: {{$clan->clanski_broj}}</h3>
<h4>Član od: {{$clan->created_at}}</h4>

<form action="{{route('clans.edit', $clan->id)}}" method="GET" style="display: inline;">
@csrf
<button type="submit">Uredi</button>
</form>

<form action="{{route('clans.destroy', $clan->id)}}" method="POST" style="display: inline;">
@csrf
@method('DELETE')
<button type="submit">Obriši</button>
</form>

<br><br>
<a href="{{route('clans.index')}}">Povratak na listu članova</a>