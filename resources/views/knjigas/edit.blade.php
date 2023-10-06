<h1>Ažuriranje knjige</h1>

<form action="{{route('knjigas.update', $knjiga->id)}}" method="POST">
    @csrf
    @method("PUT")

    <label>Naziv</label><br>
    <input type="text" name="naziv" value="{{$knjiga->naziv}}" required><br><br>
    <label>Autor</label><br>
    <input type="text" name="autor" value="{{$knjiga->autor}}" required><br><br>
    <label>Godina izdanja</label><br>
    <input type="number" name="godina_izdanja" value="{{$knjiga->godina_izdanja}}" required><br><br>
    <button type="submit">Unesi promjene</button>
</form>