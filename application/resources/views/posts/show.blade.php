@extends('home.app')

@section('title', $post['title'])

@section('content')
@if($post['is_new']) 
    <div>Nouveau blogue ! </div>
@else
    <div>Ce blogue est vieux</div>
@endif
<h1> {{ $post['title']}}</h1>
<p>{{$post["content"] }}</p>