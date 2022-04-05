<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
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
        'username',
        'role',
        'department_id'
    ];


    protected $appends = [
        'user_role'
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
    /**
     * Determine if the current user is a guest.
     *
     * @return User
     */
    public function attachment_application()
    {
        return $this->hasOne(AttachmentApplication::class);
    }
    public function supervisor()
    {
        return $this->hasOne(Supervisor::class);
    }
    public function student()
    {
        return $this->hasOne(Student::class);
    }
    public function getUserRoleAttribute()
    {
        $role = $this->role;
        switch ($role) {
            case 1:
                $r = 'Admin';
                break;
            case 2:
                $r = 'Super Admin';
                break;
            case 3:
                $r = 'Ilo';
                break;
            case 3:
                $r = 'Supervisor';
                break;

            case 4:
                $r = 'Hod';
                break;

            default:
                $r = 'User';
                break;
        }
        return $r;
    }
}
