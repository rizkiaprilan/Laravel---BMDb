<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Message;
use App\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data = Movie::orderBy('id','desc')->paginate(3);
        $inbox = Message::where('receiver','=',Auth::user()->id);
        if (Auth::user()->role == 'member') {
            $layout = 'layouts.masterMember';
            return view('home/index',[
                'data' => $data,
                'layout' => $layout,
                'inbox'=>$inbox
            ]);
        }elseif (Auth::user()->role == 'admin'){
            $layout = 'layouts.masterAdmin';
            return view('home/index',[
                'data' => $data,
                'layout' => $layout,
                'inbox'=>$inbox
            ]);
        }
        $layout = 'layouts.masterGuest';
        return view('home/index',[
            'data' => $data,
            'layout' => $layout
        ]);

    }
    public function search(Request $request){
        $search = $request->get('search');
        $data = Movie::where('title','like','%'.$search.'%')->orWhere('genre','like','%'.$search.'%')->paginate(3);

        if (Auth::user()->role == 'member') {
            $layout = 'layouts.masterMember';
            return view('home/index',[
                'data' => $data,
                'layout' => $layout,
            ]);
        }elseif (Auth::user()->role == 'admin'){
            $layout = 'layouts.masterAdmin';
            return view('home/index',[
                'data' => $data,
                'layout' => $layout,
            ]);
        }
        $layout = 'layouts.masterGuest';
        return view('home/index',[
            'data' => $data,
            'layout' => $layout,
        ]);
    }

    public function  view($id){
        $data = Movie::where('id','=',$id)->first();
        $comment = Comment::where('movie_id','=',$id)->get();

        if (Auth::user()->role == 'member') {
            $layout = 'layouts.masterMember';
            return view('home/view',[
                'layout' => $layout,
                'comment' => $comment,
                'data' => $data,
            ]);
        }elseif (Auth::user()->role == 'admin'){
            $layout = 'layouts.masterAdmin';
            return view('home/view',[
                'layout' => $layout,
                'comment' => $comment,
                'data' => $data,
            ]);
        }
        $layout = 'layouts.masterGuest';
        return view('home/view',[
            'layout' => $layout,
            'comment' => $comment,
            'data' => $data,
        ]);
    }

    public function comment(){

    }
    public function store(Request $request){
//        $userid =  Auth::user()->id;
//        dd(($request->comment));
        Comment::create([
            'user_id' => (int)$request->user_id,
            'movie_id' => (int)$request->movie_id,
            'comment' => $request->comment,
        ]);

        return redirect('/');
    }

    public  function  destroy($id){
        $data = Comment::find($id);
        $data->Delete();

        return redirect('/');
    }
}
