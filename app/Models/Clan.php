<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clan extends Model
{
    use HasFactory;

    // povezivanje modela s bazom (ako ih ima više od jedne)
    protected $connection="mysql";
    protected $table="clans";

    // omogućavanje masovnog upisa u bazu
    protected $fillable=[
        "ime",
        "prezime",
        "clanski_broj"
    ];
}
