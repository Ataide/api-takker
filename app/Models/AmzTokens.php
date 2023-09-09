<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AmzTokens extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'amz_token',
        'amz_refresh_token',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
