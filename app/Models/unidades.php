<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class unidades extends Model
{
    use HasFactory;
    protected $connection = 'mysql';
    protected $table='unidades';

    protected $dateFormat = 'd/m/y h:i:s';
    public $timestamps=false;
}
