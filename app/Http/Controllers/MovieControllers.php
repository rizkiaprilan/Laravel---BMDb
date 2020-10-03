<?php

namespace App\Http\Controllers;

use App\Genre;
use App\Movie;
use Illuminate\Http\Request;

class MovieControllers extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function manage_movie()
    {
        $data = Movie::paginate(10);
        $count = $data->firstItem();
        $layout = 'layouts.masterAdmin';
        return view('manage/movie', [
            'layout' => $layout,
            'data' => $data,
            'count' => $count
        ]);
    }

    public function add_movie()
    {
        $data = Movie::all();
        $layout = 'layouts.masterAdmin';
        $genre = Genre::all();
        return view('manage/addMovie', [
            'data' => $data,
            'layout' => $layout,
            'genre' => $genre
        ]);
    }

    public function edit_movie($id)
    {
        $data = Movie::where('id', '=', $id)->first();
        $layout = 'layouts.masterAdmin';
        $genre = Genre::all();

        return view('manage/updateMovie', [
            'data' => $data,
            'layout' => $layout,
            'genre' => $genre
        ]);
    }

    public function update_movie(Request $request)
    {
        $request->validate([
            'title' => ['required'],
            'genre' => ['required'],
            'description' => ['required'],
            'rating' => ['required', 'numeric', 'min:0', 'max:10'],
            'photo' => ['required', 'file', 'image', 'mimes:jpeg,png,jpg'],
        ]);

        $profileImage = $request->file('photo');
        $new_name = $profileImage->getClientOriginalExtension();
        $dest = storage_path('app/public/MoviePicture');
        $profileImage->move($dest, $new_name);

        Movie::where('id', '=', $request->id)
            ->update([
                'title' => $request->title,
                'genre' => $request->genre,
                'description' => $request->description,
                'rating' => $request->rating,
                'photo' => $new_name,
            ]);
        return redirect('/manage/movie');
    }

    public function store_movie(Request $request)
    {
        $request->validate([
            'title' => ['required'],
            'genre' => ['required'],
            'description' => ['required'],
            'rating' => ['required', 'numeric', 'min:0', 'max:10'],
            'photo' => ['required', 'file', 'image', 'mimes:jpeg,png,jpg'],
        ]);


        $profileImage = $request->file('photo');
        $new_name = time() . '-.' . $profileImage->getClientOriginalExtension();
        $dest = storage_path('app/public/MoviePicture');
        $profileImage->move($dest, $new_name);

        Movie::create([
            'title' => $request->title,
            'genre' => $request->genre,
            'description' => $request->description,
            'rating' => $request->rating,
            'photo' => $new_name,
        ]);

        return redirect('/manage/movie');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public
    function destroy($id)
    {
        $data = Movie::find($id);

        $data->delete();

        return redirect('/manage/movie');
    }
}
