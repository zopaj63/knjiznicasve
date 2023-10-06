<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Knjiga;

class KnjigaController extends Controller
{

    // dodati constructor, radi upita o prijavi
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $knjigas=Knjiga::all();
        return view("knjigas.index", compact("knjigas"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("knjigas.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "naziv"=>"required",
            "autor"=>"required",
            "godina_izdanja"=>"required",
        ]);

        Knjiga::create($request->all());
        return redirect()->route("knjigas.index")->with("success", "Knjiga je uspješno dodana");
    }

    /**
     * Display the specified resource.
     */
    public function show(Knjiga $knjiga)
    {
        return view("knjigas.show", compact("knjiga"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Knjiga $knjiga)
    {
        return view("knjigas.edit", compact("knjiga"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Knjiga $knjiga)
    {
        $request->validate([
            "naziv"=>"required",
            "autor"=>"required",
            "godina_izdanja"=>"required",
        ]);

        $knjiga->update($request->all());
        return redirect()->route("knjigas.index")->with("success", "Knjiga je uspješno ažurirana");
    }

    // Potvrda brisanja
    public function confirmDelete(Knjiga $knjiga)
    {
        return view("knjigas.confirm-delete", compact("knjiga"));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Knjiga $knjiga)
    {
        $knjiga->delete();
        return redirect()->route("knjigas.index")->with("success", "Knjiga je uspješno obrisana");
    }
}
