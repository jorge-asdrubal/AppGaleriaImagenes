<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image as InterventionImage;
use App\Models\Image;

class ImageController extends Controller
{
    public function index(){
        $images = Image::where('id_user', '=', Auth::user()->id_user)->get();
        return view('admin.image.images', compact("images"));
    }

    public function view_create(){
        return view('admin.image.create_image');
    }

    public function view_edit($id){
        $image = Image::find($id);
        return view('admin.image.edit_image', compact("image"));
    }

    public function save(Request $request){
        $this->validations($request);
        try {
            $txtImage = Auth::user()->name.'.'.time().'.'.$request->image->extension();
            InterventionImage::make($request->image)
                ->resize(800, null, function ($constraint) {
                    $constraint->aspectRatio();
                })
                ->save(public_path('uploads/') . $txtImage);
            Image::create([
                'url' => 'uploads/' . $txtImage,
                'id_user' => Auth::user()->id_user
            ]);
        } catch (Exception $e) {
            return redirect()->route('image.index')->withErrors('An unexpected error ocurred: '.$e->getMessage());
        }
    }

    // public function update(Request $request){
    //     $this->validations($request);
    //     $gallery = Gallery::find($request->id_gallery);
    //     if($gallery == null) return redirect()->route('gallery.index')->withErrors('Gallery not found');
    //     try {
    //         $gallery->update([
    //             'name' => $request->name,
    //             'description' => $request->description
    //         ]);
    //         return redirect()->route('gallery.index')->with('success', 'Successfully edited');
    //     } catch (Exception $e) {
    //         return redirect()->route('gallery.index')->withErrors('An unexpected error ocurred: '.$e->getMessage());
    //     }
    // }

    private function validations(Request $request){
        $request->validate([
            'image' => 'required|image|mimes:jpg,png,jpeg|max:5120'
        ]);
    }
}
