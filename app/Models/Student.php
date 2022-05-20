<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class Student extends Model
{
    use HasFactory;
    use SoftDeletes;
    use Notifiable;
    protected $with = ['user'];
    protected $fillable = [
        "phone_number",
        "department_id",
        "dob",
        "course_id",
        "alt_phone",
    ];
    public function attachment_application()
    {
        return $this->hasOne(AttachmentApplication::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function supervisor()
    {
        return $this->belongsTo(Supervisor::class);
    }
    public function department()
    {
        return $this->belongsTo(Department::class);
    }
    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
