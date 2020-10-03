<?php

namespace App\Http\Controllers;

use App\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageControllers extends Controller
{

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string'],
        ]);
        Message::create([
            'user_id' => $request->user_id,
            'message' => $request->message,
            'receiver' => $request->receiver,
            'name' => $request->name,
            'photo' => $request->photo,
        ]);
        $message = Message::where('user_id', '=', $request->user_id)->first();
//        dd($message);

        return redirect('/profile/view/' . $message->user_id);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function view($id)
    {
        $data = Message::where('user_id', '=', $id)->paginate(10);
        if (Auth::user()->role == 'member') {
            $layout = 'layouts.masterMember';
            return view('message/inbox', [
                'layout' => $layout,
                'data' => $data,
            ]);
        } elseif (Auth::user()->role == 'admin') {
            $layout = 'layouts.masterAdmin';
            return view('message/inbox', [
                'layout' => $layout,
                'data' => $data,
            ]);
        }
    }


    public function destroy($id)
    {
        $data = Message::find($id);
        $data->Delete();

        return redirect('/inbox/view/'.Auth::user()->id);
    }
}
