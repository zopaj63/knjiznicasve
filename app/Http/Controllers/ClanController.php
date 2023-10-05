<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Clan;

class ClanController extends Controller
{   
    //dodati constructor, upit prijave



    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clans=Clan::all();
        return view("clans.index", compact("clans"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("clans.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // osnovna provjera unosa (s $_POST["ime"])
        $request->validate([
            "ime"=>"required|min:2",
            "prezime"=>"required|min:2",
            "clanski_broj"=>"required|unique:clans", //navodimo ime tablice
        ]);

        // kreiranje novog člana
        Clan::create($request->all()); // ubacuje se novi član u bazu, INSERT INTO...

        // preusmjeravanje na početak uz prikaz poruke o uspjehu
        return redirect()->route("clans.index")->with("success", "Član je uspješno dodan");
    }

    /**
     * Display the specified resource.
     */
    public function show(Clan $clan) // prikazuje samo jednog člana, po nekom uvjetu
    {
        return view("clans.show", compact("clan")); //clan je varijabla bez $
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Clan $clan)
    {
        return view("clans.edit", compact("clan")); // prikaz forme za uređivanje jednog člana popunjene s podacima
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Clan $clan)
    {
        // prvo validacija unosa
        $request->validate([
            "ime"=>"required|min:2",
            "prezime"=>"required|min:2",
            "clanski_broj"=>"required|unique:clans,clanski_broj,".$clan->id, //isključenje, id se zanemaruje u validaciji jer mora ostati isti
        ]);

        // ažuriranje, upis promjene u bazu
        $clan->update($request->all());
        // redirekt na početnu s porukom o uspjehu
        return redirect()->route("clans.index")->with("success", "Podaci uspješno izmijenjeni");
        
    }

    /**
     * Remove the specified resource from storage.
     */

    // metoda za potvrdu brisanja zapisa
    public function confirmDelete(Clan $clan)
    {
        return view('clans.confirm-delete', compact('clan'));
    }
    
    // metoda za brisanje podatka
    public function destroy(Clan $clan)
    {
        $clan->delete();
        return redirect()->route("clans.index")->with("success", "Član je uspješno obrisan");
    }
}
