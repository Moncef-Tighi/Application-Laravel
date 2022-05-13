@extends('home.app')

@section('title', "Liste posts")

@section('content')

@foreach ($posts as $post)
    @include('posts.partials', $post)
@endforeach