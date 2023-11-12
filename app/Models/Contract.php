<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    use HasFactory;

    protected $fillable = [
        "date",
        "company_id",
        "employee_id",
        "job_id",
        "agb"
    ];

    public function company() {
        return $this->belongsTo(Company::class);
    }

    public function employee() {
        return $this->belongsTo(Employee::class);
    }

    public function job() {
        return $this->belongsTo(Job::class);
    }
}
