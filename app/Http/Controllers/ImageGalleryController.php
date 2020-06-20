<?php

namespace App\Http\Controllers;

use App\Gallery;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageGalleryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $galleries = Gallery::all();
        return view('gallery.index')->with('galleries', $galleries);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('gallery.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|min:4',
            'image' => 'required|image|max:5000'
        ]);

        if (request()->hasFile('image')) {
            $fileName = request()->file('image')->getClientOriginalName();
            $actualExtension = request()->file('image')->getClientOriginalExtension();
            $actualFileName = pathinfo($fileName, PATHINFO_FILENAME);
            $fileNameToStore = $actualFileName . time() . '.' . $actualExtension;
            $path = request()->file('image')->storeAs('public/image-gallery', $fileNameToStore);
            //gallery model feeding
            $gallery = new Gallery;
            $gallery->img_name = request()->title;
            $gallery->user_id = auth()->id();
            if (request()->hasFile('image')) {
                $gallery->img_url = 'storage/image-gallery/' . $fileNameToStore;
            }
            $gallery->save();
            return redirect('gallery/create')->with('success', 'Your image ' . $fileNameToStore . ' has been saved.');
        } else {
            return back()->with('error', 'Something is wrong!');
        }
    }
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $gallery = Gallery::find($id);
        return view('gallery.edit')->with('gallery', $gallery);
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
        $this->validate(request(), [
            'title' => 'required|min:4',
            'image' => 'sometimes|image|max:5000'
        ]);
        if (request()->hasFile('image')) {
            $fileName = request()->file('image')->getClientOriginalName();
            $actualFileName = pathinfo($fileName, PATHINFO_FILENAME);
            $actualExtension = pathinfo($fileName, PATHINFO_EXTENSION);
            $fileNameToStore = $actualFileName . time() . '.' . $actualExtension;
            $path = request()->file('image')->storeAs('public/image-gallery', $fileNameToStore);
        }
        $gallery = Gallery::find($id);
        $gallery->user_id = auth()->id();
        $gallery->img_name = request()->title;
        if (request()->hasFIle('image')) {
            $oldImageUrl = $gallery->img_url;
            Storage::delete('public/image-gallery/' . basename($oldImageUrl));
            $gallery->img_url = 'storage/image-gallery/' . $fileNameToStore;
        }
        $gallery->update();
        return redirect()->route('gallery.edit', ['gallery' => $gallery])->with('success', 'Edited successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $gallery = Gallery::find($id);
        $gallery->delete();
        return redirect()->route('gallery.index')->with('success', 'Gallery was deleted successfully!');
    }
    public function requestValidate()
    {
        return request()->validate([
            'title' => 'required|min:3',
            'image' => 'image|required|max:4000',
        ]);
    }
}
