<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
//use Illuminate\Database\Eloquent\Model;
use MongoDB\Laravel\Eloquent\Model;

class Data extends Model
{
    use HasFactory;
    protected $connection = 'mongodb';

    protected $fillable = [
        'nome',
        'contato',
        'bairro',
        'lideranca',
        'resultado'
    ];
}
