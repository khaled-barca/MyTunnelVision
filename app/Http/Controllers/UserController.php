<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Post;
use App\Post_Tag;
use App\Tag_User;
use App\User;
use App\Admin_Invitation;
use Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Response;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', ['except' => ['create','timeline','show']]);
        $this->middleware('admin', ['only' => ['inviteAdmin', 'invitation_data']]);
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
        if(Auth::user()){
            if(Auth::user()->id === $user->id){
                $posts = $user->posts()->get();
            }
            elseif(Auth::user()->isAdmin()){
                $posts = $user->posts()->known()->get();
            }
            else{
                $posts = $user->posts()->known()->publics()->get();
            }
        }
        else{
            $posts = $user->posts()->known()->publics()->get();
        }
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
        return redirect(action('UserController@show',[Auth::user()]))->with('message', "Successfully updated Your info.");
    }

    public function timeLine()
    {
        if(Auth::user()){
            $tags = Auth::user()->tags()->get();
            $posts = collect([]);
            foreach ($tags as $tag) {
                foreach ($tag->post()->get() as $post) {
                    if($post->user_id == Auth::id()){
                        $posts->push($post);
                    }
                    elseif(!Auth::user()->isAdmin()){
                        if(!$post->isPrivate)
                            $posts->push($post);
                       /* else{
                            if($post->user_id == Auth::id())
                                $posts->push($post);
                        }
                       */
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

    public function acceptInvitation($token)
    {
        $ai = Admin_Invitation::where('token',$token)->first();
        $user = $ai->user()->first();
        $user->type = 1;
        $ai->registered = 1;
        $user->save();
        $ai->save();
        return redirect('/')->with("message","Congratulations, You 're now an admin !!");
    }

    public function invitation_data(){
        $invitedUsers = Admin_Invitation::all();
        $ret = collect([]);
        foreach ($invitedUsers as $user){
            $registered_user = User::where(['email' => $user->email])->first();
            if(!is_null($registered_user)) {
                $user->update(['registered' => true]);
                $ret->push($user);
            }
        }
        return $ret;
    }

    public function inviteAdmin(Request $request){
        $receiver = User::find($request['id']);
        $ai = Admin_Invitation::where('user_id',$receiver->id)->first();
        if($ai){
            return redirect()->back()->with("warning","User is already on the candidate list");
        }
        else{
            $request['email'] = $receiver['email'];
            $token = bin2hex(openssl_random_pseudo_bytes(16));
            $data = array(
                'sender' => Auth::user()->fullName(),
                'receiver' => $receiver->fullName(),
                'link' => redirect(action('UserController@acceptInvitation',[$token]))->getTargetUrl()
            );
            Mail::send('emails.invitation', $data, function ($message) use ($request){
                $message->from(env('MAIL_USERNAME'), 'MyTunnelVision');
                $message->to($request->get('email'))->subject('MyTunnelVision Admin Invitation');
            });
            Admin_Invitation::create([
                'token' => $token,
                'user_id' => $receiver->id,
                'registered' => false,
            ]);
            return redirect()->back()->with("message","Invitation request successfully sent");
        }
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
