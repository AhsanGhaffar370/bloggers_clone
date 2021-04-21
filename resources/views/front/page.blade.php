@extends('front/layout/layout')

@section('page_title',$data->name)

@section('page_name',$data->name)

@section('container')

<p>
    {{$data->description}}
</p>

@endsection