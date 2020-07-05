@extends('layouts.master')

@section('style')
<style type="text/css">
    .img {
        max-width: 600px;
    }
</style>
@endsection

@section('content')
<div>
    <img class="img" src="{{ asset('img/Diagram.png') }}">
</div>
@endsection