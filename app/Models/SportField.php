<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SportField extends Model
{
    use HasFactory;
    protected $table = 'sport_field';
    protected $primaryKey = 'id';

}
