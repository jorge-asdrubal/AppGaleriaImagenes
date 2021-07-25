<?php

namespace App\Http\Controllers;

use App\Models\Rol;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(){
        $users = User::join('roles', 'roles.id_rol', '=', 'users.id_rol')
            ->select('users.*', 'roles.name as rol_name')->get();
        return view('admin.user.list_users', compact('users'));
    }

    public function view_edit($id){
        $user = User::find($id);
        $roles = Rol::all();
        return view('admin.user.edit_user', compact("user", "roles"));
    }

    public function view_register(){
        return view('admin.auth.register');
    }

    public function save(Request $request){
        $request->validate([
            'name' => 'required|string|max:100|min:3',
            'email' => 'required|email|max:100|unique:users,email',
            'password' => 'required|string|confirmed|min:8|max:20'
        ]);
        try {
            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'id_rol' => '2'
            ]);
            return redirect()->route('login')->with('success', 'Successfully created.');
        } catch (Exception $e) {
            return back()->withErrors('An unexpected error ocurred: '.$e->getMessage());
        }
    }

    public function update(Request $request){
        $this->validations_update($request);
        $user = User::find($request->id_user);
        if($user == null) return redirect()->route('users.index')->withErrors('User not found');
        try {
            if($request->password == null){
                $user->update([
                    'email' => $request->email,
                    'name' => $request->name
                ]);
            }else{
                $user->update([
                    'email' => $request->email,
                    'name' => $request->name,
                    'password' => Hash::make($request->password)
                ]);
            }
            return redirect()->route('users.index')->with('success', 'Successfully edited');
        } catch (Exception $e) {
            return redirect()->route('users.index')->withErrors('An unexpected error ocurred: '.$e->getMessage());
        }
    }

    private function validations_update(Request $request){
        if($request->previous_email == $request->email){
            $request->validate([
                'name' => 'required|string|max:100|min:3',
                'password' => 'nullable|string|confirmed|min:8|max:20'
            ]);
        }else{
            $request->validate([
                'name' => 'required|string|max:100|min:3',
                'email' => 'required|email|max:100|unique:users,email',
                'password' => 'nullable|string|confirmed|min:8|max:20'
            ]);
        }
        if(isset($request->id_rol)){
            $request->validate([
                'id_rol' => 'required|exists:roles,id_rol'
            ]);
        }
    }
}
