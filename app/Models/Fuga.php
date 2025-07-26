<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fuga extends Model
{
    use HasFactory;

    protected $table = "fugas";

    protected $fillable = [
        'menor_id',
        'fecha',
        'detalles',
    ];


    public function menor()
    {
        return $this->belongsTo(Menor::class, 'menor_id');
    }
}
