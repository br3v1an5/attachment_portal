<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        "phone_number",
        "department",
        "dob",
        "sel_class",
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
}