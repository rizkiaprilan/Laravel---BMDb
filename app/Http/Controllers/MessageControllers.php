<?php

namespace App\Http\Controllers;

use App\Message;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageControllers extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function message($id)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        Message::create([
           'user_id'=>$request->user_id,
           'message'=>$request->message,
           'receiver'=>$request->receiver,
            'name'=> $request->name,
            'photo'=> $request->photo,
        ]);

        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function view($id)
    {
        $data = Message::where('user_id','=',$id)->get();
//        $sender = User::where('id','=',$data->receiver)->first();
        if (Auth::user()->role == 'member') {
            $layout = 'layouts.masterMember';
            return view('message/inbox',[
                'layout' => $layout,
                'data'=>$data,
//                'sender'=>$sender,
            ]);
        }elseif (Auth::user()->role == 'admin'){
            $layout = 'layouts.masterAdmin';
            return view('message/inbox',[
                'layout' => $layout,
                'data'=>$data,
//                'sender'=>$sender,
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Message::find($id);
        $data->Delete();

        return redirect('/');
    }
}
