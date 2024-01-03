<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Knjiga extends Model
{
    use HasFactory;

    protected $fillable=["naziv", "autor_prezime", "autor_ime", "pocetak_citanja", "kraj_citanja", "komentar", "ocjena"];
}
