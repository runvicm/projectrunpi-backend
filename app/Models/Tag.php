<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $table = 'devlog_tags';

    protected $fillable = [
        'name',
        'slug'
    ];

    public function logs()
    {
        return $this->belongsToMany(
            Log::class,              // Related model
            'devlog_log_tags',        // Pivot table name
        )->withTimestamps();
    }
}
