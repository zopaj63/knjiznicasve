<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Posudba;

class Knjiga extends Model
{
    use HasFactory;

        // povezivanje modela s bazom (ako ih ima više od jedne)
        protected $connection="mysql";
        protected $table="knjigas";
    
        // omogućavanje masovnog upisa u bazu
        protected $fillable=[
            "naziv",
            "autor",
            "godina_izdanja",
        ];

        public function scopeAvailable($query)
        {
            return $query->where('posudena', false);
        }

        //definiranje metode koja se koristi u kontroleru posudba
        public function posudbe():HasMany
        {
            return $this->hasMany(Posudba::class, 'id_knjiga');
        }
}
