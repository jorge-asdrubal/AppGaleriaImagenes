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
        $images = Image::where('id_user', '=', Auth::user()->id_user)->orderBy('created_at', 'desc')->paginate(10);
        return view('admin.image.images', compact("images"));
    }

    public function view_create(){
        return view('admin.image.create_image');
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

    public function delete(Request $request){
        $image = Image::find($request->id_image);
        if ($image == null) return redirect()->route('image.index')->withErrors('Image not found');
        try {
            $image->delete();
            unlink($image->url);
            return redirect()->route('image.index')->with('success', 'deleted');
        } catch (Exception $e) {
            return redirect()->route('image.index')->withErrors('An unexpected error ocurred: '.$e->getMessage());
        }
    }

    public function public(Request $request){
        $image = Image::find($request->id_image);
        if($image == null) return redirect()->route('image.index')->withErrors('Image not found');
        try {
            $image->update([
                'state' => 1
            ]);
            return redirect()->route('image.index');
        } catch (Exception $e) {
            return redirect()->route('image.index')->withErrors('An undexpected error ocurred: '.$e->getMessage());
        }
    }

    public function private(Request $request){
        $image = Image::find($request->id_image);
        if($image == null) return redirect()->route('image.index')->withErrors('Image not found');
        try {
            $image->update([
                'state' => 0
            ]);
            return redirect()->route('image.index');
        } catch (Exception $e) {
            return redirect()->route('image.index')->withErrors('An undexpected error ocurred: '.$e->getMessage());
        }
    }
    
    private function validations(Request $request){
        $request->validate([
            'image' => 'required|image|mimes:jpg,png,jpeg|max:5120'
        ]);
    }
}
