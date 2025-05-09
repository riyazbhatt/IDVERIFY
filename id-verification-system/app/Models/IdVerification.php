<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IdVerification extends Model
{
    protected $fillable = [
        'image_path',
        'name',
        'phone',
        'department_id',
        'designation_id',
        'uid',
    ];

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function designation()
    {
        return $this->belongsTo(Designation::class);
    }
}
