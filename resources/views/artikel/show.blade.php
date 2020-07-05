@extends('layouts.master')

@section('style')
<style type="text/css">
	.judul {
		font-size: 25px;
		margin-bottom: 0;
	}
</style>
@endsection

@section('content')
<div class="card">
	<div class="card-body">
		<p class="judul">judul: {{ $artikel->judul }}</p>
		<p>slug: {{ $artikel->slug }}</p>
		<p>{{ $artikel->isi }}</p>
		@foreach(explode(',', $artikel->tag) as $tag)
			<button class="btn btn-success">{{ $tag }}</button>
		@endforeach
	</div>
</div>
@endsection