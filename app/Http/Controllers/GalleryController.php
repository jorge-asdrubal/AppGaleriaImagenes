<?php

namespace App\Http\Controllers;

use App\Models\Image;

class GalleryController extends Controller
{
    public function index(){
        $images = Image::join('users', 'users.id_user', '=', 'images.id_user')
            ->select('users.name as username', 'images.url')->where('images.state', '=', '1')->paginate(10);
        return view('gallery.images', compact("images"));
    }
}
