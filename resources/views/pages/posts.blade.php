@extends('_layouts.index')
@section('content-header')
    <div class="kt-subheader  kt-grid__item" id="kt_subheader">
        <div class="kt-container  kt-container--fluid ">
            <div class="kt-subheader__main">
                <h3 class="kt-subheader__title">Dashboard</h3>
                <span class="kt-subheader__separator kt-subheader__separator--v"></span>
                <span class="kt-subheader__desc">#XRS-45670</span>
                <a href="#" class="btn btn-label-warning btn-bold btn-sm btn-icon-h kt-margin-l-10">
                    Add New
                </a>
                <div class="kt-input-icon kt-input-icon--right kt-subheader__search kt-hidden">
                    <input type="text" class="form-control" placeholder="Search order..." id="generalSearch">
                    <span class="kt-input-icon__icon kt-input-icon__icon--right">
                        <span><i class="flaticon2-search-1"></i></span>
                    </span>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <div class="backgroundPosts">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="postsHeading">
                        <h1>Our Posts</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="allPosts">
                    @if(session()->has('message'))
                        <div class="alert alert-success">
                            {{ session('message') }}
                        </div>
                    @endif
                    @if(count($posts) >= 0)
                        @foreach ($posts as $post)
                            <img src="{{asset($post->image)}}" class="img-fluid mb-4 postimage">
                            <h4><a href="{{route('post.show', $post->id)}}">{{$post->name}}</a></h4>
                            <p>{{$post->body}}</p>
                            <hr>
                        @endforeach
                    @else
                    @endif
                    <div class="createbutton float-right">
                        <a href="{{url("pages/create")}}" class="btn btn-outline-primary">Create A Post</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
