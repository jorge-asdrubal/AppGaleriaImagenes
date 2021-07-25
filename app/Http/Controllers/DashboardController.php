<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function dashboard(){
        $images_number = $this->get_images_number();
        $users_number = $this->get_users_number();
        $my_images_number = $this->get_my_images_number();
        return view('admin.dashboard', compact("images_number", "users_number", "my_images_number"));
    }

    private function get_images_number(){
        $images = Image::all();
        return count($images);
    }

    private function get_users_number(){
        $users = User::all();
        return count($users);
    }

    private function get_my_images_number(){
        $user_images = Image::where('id_user', '=', Auth::user()->id_user)->get();
        return count($user_images);
    }
}
