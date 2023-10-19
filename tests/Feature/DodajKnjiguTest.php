<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Knjiga;

class DodajKnjiguTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example()
    {
        $podaci=[
            'naziv'=>'neka knjiga',
            'autor'=>'neki autor',
            'godina_izdanja'=>2023,
        ];

        $response=$this->post('/knjigas', $podaci); //umetanje podataka u bazu

        $response->assertRedirect('/knjigas'); //nakon dodavanja preusmjeravanje u popis knjiga?
        $this->assertDatabaseHas('knjigas', $podaci); //provjeri ima li tablica podatke?
        
    }
}
