<?php

namespace App\Http\Controllers;

use App\Models\Log;
use Illuminate\Http\Request;

class ApiHomepageController extends BaseController
{
    public function devlog(Request $request)
    {
        if (!$request->ajax()) {
            abort(404);
        }

        $logs = Log::with('tags')
            ->where(['status' => 'published'])
            ->orderBy('published_at', 'desc')
            ->limit(3)
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
}
