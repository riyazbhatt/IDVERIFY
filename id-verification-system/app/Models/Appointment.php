<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    protected $fillable = [
        'name',
        'parentage',
        'phone',
        'email',
        'aadhar_card_number',
        'aadhar_card_image_path',
        'uid',
    ];
}
