<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AttachmentApplication extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        "attached_dep",
        "org_email",
        "org_no",
        "insurance",
        "org_name",
        "start_date",
        "completion_date",
        "latitude",
        "longitude",
        "remark",
        "town",
        'service_number'
    ];


    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
