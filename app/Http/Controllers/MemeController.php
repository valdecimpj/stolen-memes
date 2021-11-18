<?php

namespace App\Http\Controllers;

use App\Models\Meme;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class MemeController extends Controller
{
    const allowedImageSize = 300;

    public function __construct()
    {
        $this->middleware('auth');
    }

        public function create()
    {
        return view('meme.create');
    }

    public function store()
    {
        $data = request()->validate([
            'caption' => 'required',
            'image' => ['required', 'image'],
            'author' => ['max:0'],
        ]);
        $imagePath = request('image')->store('uploads', 'public');
        var_dump($imagePath);
        $image = Image::make(public_path("storage/{$imagePath}"));
        $this->resizeImage($image);
        $image->save();

        if(DB::table('memes')->count() > 100)
            $this->deleteOldestMeme();

        auth()->user()->memes()->create([
            'image' => $imagePath,
            'caption' => $data['caption'],
        ]);
        return redirect('');
    }

    private function resizeImage(\Intervention\Image\Image $image)
    {
        $image->resize(300, 300, function ($constraint) {
            $constraint->aspectRatio();
        });
    }

    private function deleteOldestMeme(){
        $oldestMeme = Meme::oldest()->first();
        Storage::disk('public')->delete([$oldestMeme->image]);
        $oldestMeme->delete();
    }
}
