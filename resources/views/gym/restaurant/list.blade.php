@extends('_layouts.index')
@section('content')
    <div id="app">
        <restaurants></restaurants>
    </div>
    <script src="{{ mix('js/main.js') }}"></script>
@endsection
