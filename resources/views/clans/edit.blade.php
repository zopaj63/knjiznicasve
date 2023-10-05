<h1>Uređivanje člana</h1>

<form action="{{route('clans.update', $clan->id)}}" method="POST">
    @csrf
    @method("PUT")

    <label>Ime</label><br>
    <input type="text" name="ime" value="{{$clan->ime}}" required><br><br>
    <label>Prezime</label><br>
    <input type="text" name="prezime" value="{{$clan->prezime}}" required><br><br>
    <label>Članski broj</label><br>
    <input type="text" name="clanski_broj" value="{{$clan->clanski_broj}}" required><br><br>
    <button type="submit">Unesi promjene</button>
</form>