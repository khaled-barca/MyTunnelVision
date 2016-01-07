@extends('masterpage')
@section('content')
    @include('partials._post')
@endsection

@section("title")
    {{$post->title}}
@endsection