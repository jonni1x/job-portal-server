<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        "user_id",
        "address_id",
        "category_id",
        "salary",
        "skills",
        "professions",
        "birth",
        "photo",
        "gender",
    ];

    public function address() {
        return $this->belongsTo(User::class);
    }

    public function category() {
        return $this->belongsTo(Category::class);
    }
}
