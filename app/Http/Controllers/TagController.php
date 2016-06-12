<?php

namespace App\Http\Controllers;
use Auth;

use App\Tag;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Tag_Request;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth', ['except' => ['show']]);
        $this->middleware('admin', ['only' => ['requests','store']]);
    }


    public function index()
    {
        $tags = Tag::all();
        $subscribed_tags = Auth::user()->tags()->get();
        return view('tags.index' , compact('subscribed_tags','tags'));

    }

    public function requests(){
        $tags  = Tag_Request::whereNull("accepted")->get();
        return view("tags.requests",compact("tags"));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("tags.create");
    }

    public function subscribe(Tag $tag){
        Auth::user()->tags()->attach($tag);
        return redirect()->back();

    }

    public function unsubscribe(Tag $tag){
        Auth::user()->tags()->detach($tag);
        return redirect()->back();

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, ['requested_tag' => 'required']);
        $tag = Tag_Request::find($request['requested_tag']);
        if($request["submit"] == "Accept"){
            $tag->update(['accepted' => true]);
            Tag::create([
                'name' => $tag->tag
            ]);
        }
        else{
            $tag->update(['accepted' => false]);
        }

        return redirect()->back();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Tag $tag)
    {
        if(Auth::user() && Auth::user()->isAdmin()){
            $posts = $tag->post()->simplePaginate(10);
        }
        else{
            $posts = $tag->post()->publics()->simplePaginate(10);
        }

        return view('tags.show',compact('posts','tag'));
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function request_tag(Request $request){
        $this->validate($request, ['requested_tag' => 'required']);
        Tag_Request::create([
            'tag' => $request->get('requested_tag'),
            'accepted' => null
        ]);
        return redirect(action("TagController@index"))->with("message","Your request was successfully sent");
    }
}
