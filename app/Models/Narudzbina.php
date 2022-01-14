<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Narudzbina extends Model
{
    use HasFactory;

    
    protected $fillable = [
        'broj',
        'cena',
        'userID',
        'brojTelefona',
        'adresa',
        'proizvodID'
    ];

    public function klijent(){
        return $this->belongsTo(User::class);
    }

    public function odeca(){
        return $this->belongsTo(Odeca::class);
    }

    public function beauty(){
        return $this->belongsTo(Beauty::class);
    }
}
