<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Knjiga;

class DodajKnjigu extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example()
    {
        $podaci=[
            'naslov'=>'neka knjiga',
            'autor'=>'neki autor',
            'godina_izdanja'=>2023,
        ];

        $response=$this->post('/knjige', $podaci);

        $response->assertRedirect('/knjige');
        $this->assertDatabaseHas('knjige', $podaci);
        
    }
}
