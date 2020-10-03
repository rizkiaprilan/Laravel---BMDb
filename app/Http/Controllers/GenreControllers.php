<?php

namespace App\Http\Controllers;

use App\Genre;
use Illuminate\Http\Request;

class GenreControllers extends Controller
{
    public function manage_genre(){
        $data = Genre::all();
        $count = 1;
        $layout = 'layouts.masterAdmin';
        return view('manage/genre', [
            'layout' => $layout,
            'data' => $data,
            'count' => $count
        ]);
    }
    public function add_genre()
    {
        $data = Genre::all();
        $layout = 'layouts.masterAdmin';
        return view('manage/addGenre', [
            'data' => $data,
            'layout' => $layout,
        ]);
    }
    public function store_genre(Request $request)
    {
        $request->validate([
            'name' => ['required'],
        ]);
        Genre::create([
            'name' => $request->name,
        ]);

        return redirect('/manage/genre');
    }

    public function edit_genre($id)
    {
        $data = Genre::where('id', '=', $id)->first();
        $layout = 'layouts.masterAdmin';
        return view('manage/updateGenre', [
            'data' => $data,
            'layout' => $layout,
        ]);
    }

    public function update_genre(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string'],
        ]);
            Genre::where('id', '=', $request->id)
            ->update([
                'name' => $request->name,
            ]);
        return redirect('/manage/genre');
    }

    public function destroy($id){
        $data = Genre::find($id);
        $data->delete();
        return redirect('/manage/genre');
    }
}
