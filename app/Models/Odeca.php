<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Odeca extends Model
{
    use HasFactory;

    protected $fillable = [
        'naziv',
        'sifra',
        'velicina',
        'kategorijaID'
    ];

    public function kategorija(){
        return $this->belongsTo(Kategorija::class);
    }

    public function narudzbina(){
        return $this->belongsTo(Narudzbina::class);
    }
}
