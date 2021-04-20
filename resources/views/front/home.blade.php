@extends('front/layout/layout')

@section('page_title','Home Page')

@section('container')

@foreach($data as $list)
<div class="post-preview">
    <a href="post/{{$list->id}}">
    <h2 class="post-title">
        {{$list->title}}
    </h2>
    <h3 class="post-subtitle">
    {{$list->short_desc}}
    </h3>
    </a>
    <p class="post-meta">Posted on {{$list->post_date}}</p>
</div>
<hr>
@endforeach
<!-- Pager -->
<div class="clearfix">
    <a class="btn btn-primary float-right" href="#">Older Posts &rarr;</a>
</div>

@endsection