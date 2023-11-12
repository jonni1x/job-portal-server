<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillabe = [
        "name",
        "description",
        "photo"
    ];

    public function addresses() {
        return $this->hasMany(User::class);
    }

    public function employee() {
        return $this->hasMany(Employee::class);
    }

    public function job() {
        return $this->hasOne(Job::class);
    }

}

