<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function resumeUser()
    {
        return $this->hasOne(ResumeUser::class, 'user_id', 'id');
    }

    public function resumeWorks()
    {
        return $this->hasMany(ResumeWork::class, 'user_id', 'id');
    }

    public function resumeSkills()
    {
        return $this->hasMany(ResumeSkillTool::class, 'user_id', 'id');
    }

    public function resumeOthers()
    {
        return $this->hasMany(ResumeOther::class, 'user_id', 'id');
    }

    public function resumeEdus()
    {
        return $this->hasMany(ResumeEdu::class, 'user_id', 'id');
    }

    public function resumeAwards()
    {
        return $this->hasMany(ResumeAward::class, 'user_id', 'id');
    }

    public function resumeLangs()
    {
        return $this->hasMany(ResumeLang::class, 'user_id', 'id');
    }

    public function resumeInterests()
    {
        return $this->hasMany(ResumeInterest::class, 'user_id', 'id');
    }
}
