<h1>Popis knjiga</h1>

@if (session('success'))
    <h3 style="color: green;">{{session('success')}}
@elseif (session('error'))
    <h3 style="color: red;">{{session('error')}}
@endif

<ol>
    @foreach ($knjigas as $knjiga)
    <li>
        <form action="{{route('knjigas.show', $knjiga->id)}}" method="GET" style="display: inline;">
            @csrf
            <button type="submit">Prikaži</button>
        </form>

        <form action="{{route('knjigas.edit', $knjiga->id)}}" method="GET" style="display: inline;">
            @csrf
            <button type="submit">Uredi</button>
        </form>

        <form action="{{route('knjigas.confirm-delete', $knjiga->id)}}" method="GET" style="display: inline;">
            @csrf
            @method("DELETE")
            <button type="submit">Obriši</button>
        </form>

        <b>ID:</b> {{$knjiga->id}}
        <b>Naziv:</b> {{$knjiga->naziv}} 
        <b>Autor:</b> {{$knjiga->autor}}
        <b>Izdanje:</b> {{$knjiga->godina_izdanja}}
        <b>Upisano:</b> {{$knjiga->created_at->format("F, Y")}}
        <hr>
    </li>
    @endforeach
</ol>

<form action="{{route('knjigas.create')}}" method="GET">
    <button type="submit">Dodaj novu knjigu</button>
</form>