<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Post;
use App\Post_Tag;
use App\Tag_User;
use App\User;
use Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Response;
use Symfony\Component\HttpFoundation\RedirectResponse;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', ['except' => ['create','timeline','show']]);
        $this->middleware('admin', ['only' => ['makeAdmin']]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        redirect('auth/register');
    }

    public function index(){
        //
    }

    /**
     * Display the specified resource.
     *
     * @return Response
     */
    public function show(User $user)
    {
        $posts = $user->posts()->get();
        $comments = $user->comments()->get();
        return view('users.show',compact('user','posts','comments'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param User $user
     * @return Response
     */
    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @return Response
     * @internal param User $user
     * @internal param int $id
     */
    public function update(Request $request)

    {
        $this->validate($request, [
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'sex' => 'required',
            'date_of_birth' => 'required'
        ]);
        $request['date_of_birth'] = Carbon::parse($request->get('date_of_birth'));
        Auth::user()->update($request->all());
        return redirect(url('/users/show'))->with('message', "Successfully updated Your info.");
    }

    public function timeLine()
    {
        if(Auth::user()){
            $tags = Auth::user()->tags()->get();
            $posts = collect([]);
            foreach ($tags as $tag) {
                foreach ($tag->post()->get() as $post) {
                    if(!Auth::user()->type){
                        if(!$post->private)
                            $posts->push($post);
                        else{
                            if($post->user_id == Auth::id())
                                $posts->push($post);
                        }
                    }else{
                        $posts->push($post);
                    }
                }
            }
            $posts =  new Paginator($posts->unique('id'),10);
            if(strpos(redirect()->back()->getTargetUrl(),'login') === false){
                return view('welcome',compact('posts','tags'));
            }
            else{
                return view('welcome',compact('posts','tags'))->with('message','Welcome '. Auth::user()->fullName());
            }
        }
        else{
            return redirect(action("PostController@index"));
        }
    }

    public function makeAdmin(User $user)
    {
        $user->update([
            'type' => 1
        ]);
        return redirect('/');
    }

    public function history($id){
        $user = User::where(['id' => $id])->first();
        $posts = $user->posts()->getResults();
        $comments = $user->comments()->getResults();
        $post_votes = $user->post_vote()->getResults();
        $comment_votes = $user->comment_vote()->getResults();
        return ['posts' => $posts,
        'comments' => $comments,
        'post_votes' => $post_votes,
        'comment_votes' => $comment_votes];
    }
}
