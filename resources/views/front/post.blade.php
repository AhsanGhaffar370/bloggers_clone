@extends('front/layout/layout')

@section('page_title',$data->title)

@section('page_name',$data->title)

@section('container')

<p>
    {{$data->long_desc}}
</p>

@endsection