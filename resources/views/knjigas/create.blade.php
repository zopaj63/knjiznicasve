<h1>Dodavanje nove knjige</h1>

<form action="{{route('knjigas.store')}}" method="POST">
    @csrf
    <label>Naziv knjige</label>
    <input type="text" name="naziv"><br><br>
    <label>Autor</label>
    <input type="text" name="autor"><br><br>
    <label>Godina izdanja</label>
    <input type="number" name="godina_izdanja"><br><br>
    <button type="submit">Dodaj člana</button>
</form>