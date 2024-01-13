<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class viajes extends Model
{
    
    protected $connection = 'mysql';
    protected $table='viaje';

    protected $dateFormat = 'd/m/y h:i:s';
    public $timestamps=false;
    use HasFactory;
}
