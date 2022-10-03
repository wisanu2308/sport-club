<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SportAddon extends Model
{
    use HasFactory;
    protected $table = 'sport_addon';
    protected $primaryKey = 'id';
}
