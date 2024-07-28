<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Session extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'sessions';

    protected $fillable = [
        'user_name',
        'title',
        'platform',
        'url',
        'password',
        'passion_level',
        'content',
    ];

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'session_tags', 'session_id', 'tag_id');
    }
}
