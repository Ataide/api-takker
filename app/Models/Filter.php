<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Filter extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'speed',
        'minimum_after_duration',
        'minimum_base_peroffer',
        'start_time_padding',
        'stop_after_catch',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
