<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShiftEntry extends Model
{
    /** @use HasFactory<\Database\Factories\ShiftEntryFactory> */
    use HasFactory;

    protected $fillable = [
        'shift_name',
        'shift_group',
        'user_id',
        'start_time',
        'end_time',
        'shift_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
