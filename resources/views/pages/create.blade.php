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
            @if ($errors->any())
                <div class="errorPart">
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif
            <div class="createForm">
                <form action="{{route('post.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="name">Enter Title</label>
                        <input type="text" name="name" class="form-control" value="">
                    </div>
                    <div class="form-group">
                        <label for="image">Select Your Image</label>
                        <input type="file" name="image" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="body">Description</label>
                        <textarea name="body" name="body" cols="30" rows="8" class="form-control"></textarea>
                    </div>
                    <input type="hidden" _method="POST">
                    <input type="submit" class="btn btn-outline-primary">
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
