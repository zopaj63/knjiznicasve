<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Clan;
use App\Models\Knjiga;
use App\Models\Posudba;

class PosudbaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posudbe=Posudba::with("clan", "knjiga")->get(); // eloquent orm: dohvat podataka s INNER JOIN
        return view("posudbas.index", compact("posudbe")); // sve posudbe sa clanovima i knjigama iz baze
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $clanovi=Clan::all(); // priprema za padajuću listu, select-option
        $knjige=Knjiga::all();
        return view("posudbas.create", compact("clanovi", "knjige"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // sprema podatke dijelom iz baze, dijelom s forme, u tablicu posudbas
        $request->validate([
            "id_clan"=>"required",
            "id_knjiga"=>"required",
            "datum_posudbe"=>"required|date",
        ]);

        Posudba::create($request->all()); // spremanje posudbe u bazu
        return redirect()->route("posudbas.index")->with("success", "Posudba uspješno pohranjena");
    }

    /**
     * Display the specified resource.
     */
    public function show(Posudba $posudba)
    {
        return view("posudbas.show", compact("posudba"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Posudba $posudba) // ime modela koji se pretražuje i varijabla u koju laravel automatski pohrani podatak određenog id-a, instancu modela koji odgovara id-u
    {
        $clanovi=Clan::all();
        $knjige=Knjiga::all();
        return view("posudbas.edit", compact("posudba", "clanovi", "knjige"));
        // implicitna veza modela ruta, laravel automatski stvara, injektira instancu posudba
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Posudba $posudba)
    {
        $request->validate([
            "id_clan"=>"required",
            "id_knjiga"=>"required",
            "datum_posudbe"=>"required|date",
            "datum_vracanja"=>"required|date",
        ]);

        $posudba->update($request->all()); //pohrana u bazu validirane ažurirane podatke
        return redirect()->route("posudbas.index")->with("success", "Posudba uspješno ažurirana");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Posudba $posudba)
    {
        $posudba->delete();
        return redirect()->route("posudbas.index")->with("success", "Posudba uspješno obrisana");
    }
}
