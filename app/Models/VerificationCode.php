<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VerificationCode extends Model
{
    use HasFactory;

    protected $fillable = [
        "code",
        "user_Id"
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
