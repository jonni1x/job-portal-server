<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $fillabe = [
        "name",
        "email",
        "password",
        "phone",
        "url",
        "address_id",
        "user_id",
        "logo",
        "description",
        "state",
        "disabled",
    ];

    public function addresses() {
        return $this->belongsTo(Address::class);
    }

    public function users() {
        return $this->belongsTo(User::class);
    }

    public function contracts() {
        return $this->hasMany(Contract::class);
    }

    public function jobs() {
        return $this->hasMany(Job::class);
    }
}
