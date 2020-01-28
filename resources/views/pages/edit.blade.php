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
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                @if(session()->has('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                @endif
                <div class="createForm">
                    <form action="{{route('post.update', $posts->id)}}" method="POST"  enctype="multipart/form-data">
                        @csrf
                        <div class="form-group loginFields">
                            <label for="name">Enter Title</label>
                            <input type="text" name="name" value="{{$posts->name}}" class="form-control">
                        </div>
                        <div class="form-group loginFields">
                            <label for="image">Select Your Image</label>
                            <div class="image">
                                <img src="{{asset($posts->image)}}" alt="Image" class="img-fluid postimage mb-4">
                            </div>
                            <input type="file" name="image" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="body">Description</label>
                            <textarea name="body" name="body" cols="30" rows="10" class="form-control">{{$posts->body}}</textarea>
                        </div>
                        @method('PUT')
{{--                        <input type="hidden" _method="PUT">--}}
                        <input type="submit" value="Update!" class="btn btn-outline-primary">
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
