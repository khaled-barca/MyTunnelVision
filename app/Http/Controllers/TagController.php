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
    public function index()
    {
        $tags = Tag::all();
        $subscribed_tags = Auth::user()->tags()->get();
        return view('tags.index' , compact('subscribed_tags','tags'));

    }

    public function requests(){
        return view("tags.requests");

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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Tag $tag)
    {
        $posts = $tag->post()->simplePaginate(10);
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
            'accepted' => false
        ]);
        return redirect('/');
    }

    public function accept_requested_tag(Request $request){
        $this->validate($request, ['requested_tag' => 'required']);
        $tag = Tag_Request::where(['tag' => $request->get('requested_tag')]);
        $tag->update(['accepted' => true]);
        Tag::create([
            'name' => $tag->tag,
            'private' => false
        ]);
        return redirect('/');
    }
}
