<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Veiculo extends Model
{
    protected $table = 'table_veiculos';

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

}
