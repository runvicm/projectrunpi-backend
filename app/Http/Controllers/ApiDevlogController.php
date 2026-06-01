<?php

namespace App\Http\Controllers;

use App\Http\Controllers\BaseController;
use App\Models\Log;
use App\Models\Status;
use Illuminate\Http\Request;

class ApiDevlogController extends BaseController
{
    public function status()
    {
        $status = Status::latest()->first()->status ?? 'No Status';

        return response()->json($status);
    }

    public function logs()
    {
        $logs = Log::with('tags')
            ->where(['status' => 'published'])
            ->orderBy('published_at', 'desc')
            ->get()
            ->map(fn($log) => [
                'title' => ucwords($log->title),
                'slug' => $log->slug,
                'overview' => $log->overview,
                'published_at' => $log->published_at->format('M d, Y'),
                'view_count' => $log->view_count,
                'tags' => $log->tags->map(fn($tag) => ['slug' => $tag->slug]),
            ]);

        return response()->json($logs);
    }

    public function view(string $slug)
    {
        $log  = Log::where('slug', $slug)->with('tags')->firstOrFail();

        $logData = [
            'title' => ucwords($log->title),
            'overview' => $log->overview,
            'content' => $log->content,
            'published_at' => $log->published_at->format('M d, Y'),
            'view_count' => $log->view_count,
            'tags' => $log->tags->map(fn($tag) => ['slug' => $tag->slug]),
        ];

        return response()->json($logData);
    }


    public function addView(string $slug)
    {
        $log  = Log::where('slug', $slug)->firstOrFail();
        $log->increment('view_count');
    }
}
