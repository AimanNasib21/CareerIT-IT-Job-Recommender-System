<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResumeUser extends Model
{
    use HasFactory;

    protected $fillable = [
        'job_title',
        'summary',
        'phone',
        'linkedin',
        'github',
        'codepen',
        'website',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
