<h1>Lista članova</h1>

@if (session('success'))
    <h3 style="color: green;">{{session('success')}}
@elseif (session('error'))
    <h3 style="color: red;">{{session('error')}}
@endif

<ol>
    @foreach ($clans as $clan)
    <li>
        <form action="{{route('clans.show', $clan->id)}}" method="GET" style="display: inline;">
            @csrf
            <button type="submit">Prikaži</button>
        </form>

        <form action="{{route('clans.edit', $clan->id)}}" method="GET" style="display: inline;">
            @csrf
            <button type="submit">Uredi</button>
        </form>

        <form action="{{route('clans.confirm-delete', $clan->id)}}" method="GET" style="display: inline;">
            @csrf
            @method("DELETE")
            <button type="submit">Obriši</button>
        </form>

        <b>ID:</b> {{$clan->id}}
        <b>Ime:</b> {{$clan->ime}} 
        <b>Prezime:</b> {{$clan->prezime}}
        <b>Čl. br.:</b> {{$clan->clanski_broj}}
        <b>Upisan:</b> {{$clan->created_at}}
        <hr>
    </li>
    @endforeach
</ol>

<form action="{{route('clans.create')}}" method="GET">
    <button type="submit">Dodaj novog člana</button>
</form>