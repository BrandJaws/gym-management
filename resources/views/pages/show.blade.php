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
<div class="backgroundServices">
    <div class="container">
        <div class="title">
            <h1>Show</h1>
        </div>
    </div>
</div>
<hr>
<div class="AboutUS   pb-4">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="postPage">
                    <div class="bottomButton pb-4">
                        <a href="{{$posts->id}}/edit" class="btn btn-outline-primary">Edit</a>
                        <form action="{{route('post.delete', $posts->id)}}" method="POST" style="display: inline">
                            @csrf
                            @method('DELETE')
{{--                            <input type="hidden" _method="DELETE">--}}
                            <input type="submit" value="Delete" class="btn btn-outline-primary float-right">
                        </form>
                    </div>
                    <img src="{{asset($posts->image)}}" class="img-fluid mb-4 postimage">
                    <h4>{{$posts->name}}</h4>
                    <p>{{$posts->body}}</p>
                    <hr>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
