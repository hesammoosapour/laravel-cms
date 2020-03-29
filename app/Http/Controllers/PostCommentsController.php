<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Post;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PostCommentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comments = Comment::withTrashed()->get();

        $comments_no = Comment::withTrashed()->count();
        $comments_no_active = Comment::count();
        $comments_no_approved = Comment::whereIs_active(1)->count();

        foreach ($comments as $comment) {

            $user = User::findOrFail($comment->commenter_id)->first(); // Try this for other admins, see if it works.

            return view('admin.comments.index',
                compact('comments','user','comments_no','comments_no_active','comments_no_approved'));
        }

        return view('admin.comments.index', compact('comments'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
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
        $user = Auth::user();
        $data = [
            'post_id' =>$request->post_id,
            'body' => $request->body,
            'commenter_id'=> $user->id,
        ];
        Comment::create($data);
        $request->session()->flash('comment_message','Your comment has been sent and is waiting moderation');

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $post = Post::whereId($id)->withTrashed()->get();
//        Get comments for all posts including those which have been even deleted

        $comments_no = Post::findOrFail($post[0]->id)->comments()->withTrashed()->count();
        $comments_no_active = Post::findOrFail($post[0]->id)->comments()->count();
        $comments_no_approved = Post::findOrFail($post[0]->id)->comments()->whereIs_active(1)->count();

        $comments = $post[0]->comments;
        $all_comments = Comment::withTrashed()->wherePost_id($id)->get();

        foreach ($all_comments as $comment) {

            $user = User::findOrFail($comment->commenter_id)->first(); // Try this for other admins, see if it works.

            return view('admin.comments.show',
                compact('comments','all_comments','user','comments_no','comments_no_active','comments_no_approved'));
        }

        return view('admin.comments.show', compact('comments','comments_no'));

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

        Comment::findOrFail($id)->update($request->all());

        return redirect('/admin/comments');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        Comment::findOrFail($id)->delete();

        return redirect()->back();

    }
}
