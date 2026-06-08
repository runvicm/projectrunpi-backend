<?php

namespace App\Http\Controllers;

use App\Services\ServerServices;

class ApiMinecraftController extends BaseController
{
    public function stat(ServerServices $serverService)
    {
        $status = $serverService->getServerStatus(
            host: config('minecraft.mc.host'),
            port: config('minecraft.mc.port'),
        );

        return response()->json($status);
    }
}
