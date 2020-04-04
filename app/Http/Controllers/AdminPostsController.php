<?php

namespace App\Http\Controllers;

use App\Category;
use App\Comment;
use App\CommentReply;
use App\Http\Requests\PostsCreateRequest;
use App\Photo;
use App\Post;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class AdminPostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        $posts = Post::withTrashed()->IdOldest('id');

        $posts = Post::with('comments.replies')->withTrashed()->latest("updated_at")->paginate(10);


        return view('admin.posts.index', compact('posts','comments'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::pluck('name','id')->all();

        return view('admin.posts.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostsCreateRequest $request)
    {
        $input = $request->all();

        $user = Auth::user();

        if($file = $request->file('photo_id')){

            $name = time() . $file->getClientOriginalName();

            $file->move('images', $name);

            $photo = Photo::create(['path'=>$name]);

            $input['photo_id'] = $photo->id;
        }
        $user->posts()->create($input);

        return redirect('/admin/posts');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
//        $posts = Post::withCount('comments')->get();
//        foreach ($posts as $post) {
//            echo $post->comments_count;
//        }

//        $posts_dependencies = Post::withCount('comments', 'replies')->get();
//
//        echo $posts_dependencies[0]->comments_count;
//        echo $posts_dependencies[0]->replies_count;

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $post = Post::findOrFail($id);
//        $post = Post::withTrashed()->findOrFail($id);

        $categories = Category::pluck('name','id')->all();

        return view('admin.posts.edit', compact('post','categories'));


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
        $input = $request->all();

        if($file = $request->file('photo_id')){

            $name = time() . $file->getClientOriginalName();

            $file->move('images', $name);

            $photo = Photo::create(['path'=>$name]);

            $input['photo_id'] = $photo->id;
        }

        Auth::user()->posts()->whereId($id)->first()->update($input);
//        Auth::user()->posts()->withTrashed()->whereId($id)->first()->update($input);

        return redirect('/admin/posts');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);

        if ( $post->photo_id)
//        unlink(public_path() . $post->photo->path);

        $post->delete();

        $message = "The post" . $post->title . " has been deleted";
        Session::flash('deleted_post',$message);

        return redirect('/admin/posts');
    }

    public function post($slug)
    {

         $is_post_slug =  Post::whereSlug($slug)->first();
         if ($is_post_slug)
             $post = Post::findBySlugOrFail($slug);
         else $post = Post::findOrFail($slug);

         $comments = $post->comments()->whereIsActive(1)->get();
         $categories = Category::all();

        $author = User::whereId($post->user_id)->first();
        $author_photo =  Photo::whereId($author->photo_id)->first() ;
        $author_photo = $author_photo->path;


       if ($comments) {
           foreach ($comments as $comment) {

               $commenter_id = $comment->commenter_id;
               $commenter = User::where('id', $commenter_id)->first();
               $commenter_photo_id = $commenter->photo_id;
               $commenter_photo_name = Photo::whereId($commenter_photo_id)->first();
               $commenter_photo_path = $commenter_photo_name->path;

               if (count($comment->replies) != 0) {
                   $replier_id = $comment->replies[0]->replier_id;
                   $replier = User::where('id', $replier_id)->first();
                   $replier_photo_id = $replier->photo_id;
                   $replier_photo_name = Photo::whereId($replier_photo_id)->first();
                   $replier_photo_path = $replier_photo_name->path;

                   return view('post', compact('post', 'comments', 'categories', 'commenter_photo_path',
                       'commenter', 'replier', 'replier_photo_path','author_photo'));
               }
               return view('post', compact('post', 'comments', 'categories', 'commenter_photo_path',
                   'commenter', 'replier', 'replier_photo_path','author_photo'));
           }

       }

        return view('post', compact('post','comments','author_photo'));

    }


}
