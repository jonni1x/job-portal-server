<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $fillable = [
        "country",
        "city",
        "street",
        "zip",
    ];

    function employees() {
        return $this->hasMany(Employee::class);
    }

    function companies() {
        return $this->hasMany(Company::class);
    }


}
