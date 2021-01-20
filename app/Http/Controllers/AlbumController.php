<?php


namespace App\Http\Controllers;


use App\Models\Album;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AlbumController extends Controller
{
    public function viewWelcome()
    {
        $photos = Album::orderByDesc('id')->get();
        return view('welcome', compact('photos'));
    }

    public function viewNewAlbum()
    {
        return view('new');
    }

    public function postAlbum(Request $request)
    {
        $ext = $request->file('image')->getClientOriginalExtension();
        $fileName = Str::random(10) . "." . $ext;

        $request->file('image')->storeAs('public/images', $fileName);

        Album::create([
            'description' => $request->input('description'),
            'image_path' => "images/" . $fileName
        ]);

        return redirect('/');
    }
}
