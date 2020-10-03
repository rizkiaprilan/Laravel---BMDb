<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminControllers extends Controller
{
    public function manage_user()
    {
        $data = User::orderBy('id', 'asc')->paginate(10);
        $count = $data->firstItem();
        $layout = 'layouts.masterAdmin';
        return view('manage/user', [
            'data' => $data,
            'layout' => $layout,
            'count' => $count,

        ]);
    }

    public function add_user()
    {
        $data = User::all();
        $layout = 'layouts.masterAdmin';
        return view('manage/addUser', [
            'data' => $data,
            'layout' => $layout,
        ]);
    }

    public function store_user(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:100'],
            'email' => ['required', 'string', 'email', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed', 'alpha_num'],
            'gender' => ['required'],
            'address' => ['required', 'string'],
            'role' => ['required', 'string'],
            'date' => ['required', 'date'],
            'photo' => ['required', 'file', 'image', 'mimes:jpeg,png,jpg'],
        ]);


        $profileImage = $request->file('photo');
        $new_name = time() . '-.' . $profileImage->getClientOriginalExtension();
        $dest = storage_path('app/public/UserPicture');
        $profileImage->move($dest, $new_name);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'gender' => $request->gender,
            'address' => $request->address,
            'role' => $request->role,
            'date' => $request->date,
            'photo' => $new_name,
        ]);

        return redirect('/manage/user');
    }

    public function edit_user($id)
    {
        $data = User::where('id', '=', $id)->first();
        $layout = 'layouts.masterAdmin';
        return view('manage/updateUser', [
            'data' => $data,
            'layout' => $layout,
        ]);

    }
    public function update_user(Request $request)
    {
        $profileImage = $request->file('photo');
        $new_name = time().'-.'. $profileImage->getClientOriginalExtension();
        $dest = storage_path('app/public/UserPicture');
        $profileImage->move($dest,$new_name);

        User::where('id', '=', $request->id)
            ->update([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'gender' => $request->gender,
                'address' => $request->address,
                'role'=> $request->role,
                'date' => $request->date,
                'photo' => $new_name,
            ]);
        return redirect('/manage/user');

    }

    public function destroy($id){
        $user = User::find($id);
        if (Auth::user()->id == $id){   //admin delete diri sendiri, langsung ke halaman guest
            $user->delete();
            return redirect('/');
        }
        $user->delete();                //delete tapi tidak kehapus datanya di database karna pake softdelete
        return redirect('/manage/user');

    }

}
