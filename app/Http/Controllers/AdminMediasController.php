<?php

namespace App\Http\Controllers;

use App\Photo;
use App\Post;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Session;

class AdminMediasController extends Controller
{

    public function index(){

//        $photos = Photo::all();
        $photos = Photo::withTrashed()->latest('updated_at')->paginate(20);
//        $photos = Photo::latest('updated_at')->get();



            return view('admin.media.index', compact('photos'));

    }

    public function create()
    {
        return view('admin.media.create');
    }

    public function store(Request $request)
    {
        $file = $request->file('file');

        $name = time() . $file->getClientOriginalName();

        $file->move('images', $name);

        Photo::create(['path'=>$name]);

    }
    public function destroy($id)
    {
        $photo = Photo::findOrFail($id);
//        unlink(public_path() . $photo->path); // delete photo

        $photo->delete();

        $photo_name =str_replace('/images/', ' ', $photo->path)  ; // just get name not the whole path

        Session::flash('deleted_photo',$photo_name);

        return redirect('/admin/media');

    }

    public function deleteMedia(Request $request){

        $photos = Photo::findOrFail($request->checkBoxArray);

        foreach($photos as $photo){

            $photo->delete();
            $photos_name = str_replace('/images/', ' ', $photo->path)  ; // just get name not the whole path
            Session::flash('multi_deleted_photo',$photos_name);
            //  dont' know how to pass it as kind of an array to show multiple files message
        }
        return redirect()->back();
    }

}
