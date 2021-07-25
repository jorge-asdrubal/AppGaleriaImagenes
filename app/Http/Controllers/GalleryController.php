<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index(){
        $images = Image::join('users', 'users.id_user', '=', 'images.id_user')
            ->select('users.name as username', 'images.url')->paginate(10);
        return view('gallery.images', compact("images"));
    }
}
