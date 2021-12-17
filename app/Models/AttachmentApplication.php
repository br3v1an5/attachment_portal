<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AttachmentApplication extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [];
    public function student()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
