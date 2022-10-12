<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookingAddon extends Model
{
    use HasFactory;
    protected $table = 'booking_addon';
    protected $primaryKey = 'id';

}
