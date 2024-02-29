<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResumeWork extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'company',
        'website',
        'start_year',
        'end_year',
        'description',
        'achievements',
        'technologies',
        'user_id'
    ];

    protected $casts = [
        'technologies' => 'json'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
