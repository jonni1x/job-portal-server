<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    protected $fillable = [
        "category_id",
        "title",
        "image",
        "description",
        "salary",
        "start",
        "skills",
        "location",
        "work_hour",
        "responsibilites",
        "benefits",
        "company_id",
    ];

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function company() {
        return $this->belongsTo(Company::class);
    }
}
