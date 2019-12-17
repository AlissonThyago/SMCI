<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Medicao extends Model
{
	protected $table="medicaos";
    protected $fillable = [
        'valor', 'data_horario', 'sensor_id'
    ];
}
