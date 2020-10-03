<?php

namespace App\Http\Controllers;

use App\Bookmark;
use App\Movie;
use Illuminate\Support\Facades\Auth;

class BookmarkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function save($id)
    {
        $data = Movie::where('id', '=', $id)->first();
        Bookmark::create([
            'user_id' => Auth::user()->id,
            'movie_id' => $data->id,
        ]);
//        dd($cek);
        return redirect('/');
    }

    public function show()
    {
        $saved = Bookmark::where('user_id','=',Auth::user()->id)->orderBy('id', 'asc')->paginate(10);

        $layout = 'layouts.masterMember';
        return view('bookmark/view', [
            'saved' => $saved,
            'layout' => $layout,
        ]);
    }

    public function destroy($id)
    {
        $data = Bookmark::find($id);
        $data->Delete();

        return redirect('/bookmark/show');
    }
}
