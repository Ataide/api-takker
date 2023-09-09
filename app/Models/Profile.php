<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Profile extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'user_id',
        'amz_token',
        'tap_interval',
        'auto_stop_after_crash',
        'auto_resume_search',
        'offer_lead_time',
        'minimum_base_paytype',
        'minimum_base_payvalue',
        'offer_duration_start',
        'offer_duration_end',
        'working',
        'timezone',
        'account_status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
