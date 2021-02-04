<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/{locale}', function ($locale) {
    $data = json_decode(file_get_contents('https://tmi.twitch.tv/group/user/danielhe4rt/chatters'), true);
    $count = 0;
    $list = [];

    $colors = [
        'broadcaster' => '#f32129',
        'vips' => '#da205a',
        'moderators' => '#00ab28',
        'viewers' => 'rgba(203, 213, 224, var(--text-opacity))'
    ];

    foreach ($data['chatters'] as $type => $chatterType) {
        $count += count($chatterType);
        foreach ($chatterType as $key => $chatter) {
            $list[] = [
                'name' => $chatter,
                'badge' => $type
            ];
        }
    }
    shuffle($list);
    $viewers = [
        'chatters' => $list,
        'count' => $count
    ];
    App::setLocale($locale);
    return view('welcome', compact(['viewers', 'colors']));
});
