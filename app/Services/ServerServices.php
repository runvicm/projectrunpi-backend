<?php

namespace App\Services;

use xPaw\MinecraftPing;
use xPaw\MinecraftPingException;


class ServerServices
{
    public function getServerStatus($host = null, $port = null)
    {

        $ping = null;

        try {
            $ping = new MinecraftPing($host, $port, 2, false);
            $info = $ping->Query();

            return [
                'online' => true,
                'favicon' => $info['favicon'],
                'players' => [
                    'online' => $info['players']['online'],
                    'max' => $info['players']['max'],
                    // 'list' => array_map(
                    //     fn($player) => $player['name'],
                    //     $info['players']['sample'] ?? []
                    // )
                ],
                'address' => config('app.name')('minecraft.mc.ipAddress'),
                'version' => $info['version']['name'] ?? 'Unknown',
                'modloader' => config('minecraft.mc.modLoader'),
                'modloaderVer' => config('minecraft.mc.modLoaderVer'),
                'modpack' => config('minecraft.mc.modPack'),
                'modpackVer' => config('minecraft.mc.modPackVer'),
                'difficulty' => config('minecraft.mc.difficulty'),
                'description' => $info['description']['text'],

            ];
        } catch (MinecraftPingException $e) {
            return [
                'online' => false,
                'favicon' => asset('assets/icons/Minecraft.svg'),
                'players' => [
                    'online' => 0,
                    'max' => 0,
                    // 'list' => array_map(
                    //     fn($player) => $player['name'],
                    //     $info['players']['sample'] ?? [] 
                    // )
                ],
                'address' => 'Unknown',
                'version' => 'Unknown',
                'modloader' =>  'Unknown',
                'modloaderVer' => 'Unknown',
                'modpack' => 'Unknown',
                'modpackVer' => 'Unknown',
                'difficulty' => 'Unknown',
                'description' => 'Unknown',

                // 'error' => $e->getMessage()
            ];
        } finally {
            if ($ping) {
                $ping->Close();
            }
        }
    }
}
