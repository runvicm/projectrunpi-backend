<?php

namespace App\Models;

use DateTime;
use DateTimeZone;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Log extends Model
{
    use SoftDeletes;
    use HasFactory;

    protected $table = 'devlog_logs';

    protected $fillable = [
        'title',
        'slug',
        'overview',
        'content',
        'status',
        'view_count',
        'published_at',
    ];

    protected $casts = [
        'published_at' => 'datetime',
        'view_count' => 'integer'
    ];

    public function tags()
    {
        return $this->belongsToMany(
            Tag::class,
            'devlog_log_tags',
        );
    }
}
