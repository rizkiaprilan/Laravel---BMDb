<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileControllers extends Controller
{
    public function view($id)
    {
        $data = User::where('id','=',$id)->first();

        if (Auth::user()->role == 'member') {
            $layout = 'layouts.masterMember';
            return view('profile/view',[
                'layout' => $layout,
                'data'=>$data,
            ]);
        }elseif (Auth::user()->role == 'admin'){
            $layout = 'layouts.masterAdmin';
            return view('profile/view',[
                'layout' => $layout,
                'data'=>$data,
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = User::where('id', '=', $id)->first();

        if (Auth::user()->role == 'member') {
            $layout = 'layouts.masterMember';
            return view('profile/edit',[
                'layout' => $layout,
                'data'=>$data,
            ]);
        }elseif (Auth::user()->role == 'admin'){
            $layout = 'layouts.masterAdmin';
            return view('profile/edit',[
                'layout' => $layout,
                'data'=>$data,
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
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
                'role'=> Auth::user()->role,
                'date' => $request->date,
                'photo' => $new_name,
            ]);
        $user = User::where('id', '=', $request->id)->first();
        return redirect('/profile/view/'.$user->id);
    }
}
