<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Clan;
use App\Models\Knjiga;

class Posudba extends Model
{
    use HasFactory;

    protected $connection="mysql";
    protected $table="posudbas";

    protected $fillable=[
        "id_clan",
        "id_knjiga",
        "datum_posudbe",
        "datum_vracanja",
    ];

    public function clan() //eloquent relationshipp - odnos između posudbe i člana
    {
        return $this->belongsTo(Clan::class, 'id_clan'); // svaki zapis u posudba MORA pripadati nekom zapisu u clan
        // $clan->$posudba->clan; - posudba (dijete) ima znanja o nekom clanu (roditelj)
    }

    public function knjiga()
    {
        return $this->belongsTo(Knjiga::class, 'id_knjiga'); // jer nismo upisali knjiga_id
    }
}
