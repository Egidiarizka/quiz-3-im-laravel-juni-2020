@extends('layouts.master')

@section('content')
<form action="{{ route('artikel.store') }}" method="post">
	<h4 class="text-center">Buat Artikel</h4>
	{{ csrf_field() }}
	<div class="form-group">
		<label for="judul">Judul</label>
		<input type="text" name="judul" id="judul" class="form-control">
	</div>
	<div class="form-group">
		<label for="isi">Isi</label>
		<input type="text" name="isi" id="isi" class="form-control">
	</div>
	<div class="form-group">
		<label for="tag">Tag</label>
		<input type="text" name="tag" id="tag" class="form-control">
	</div>
	<button class="btn btn-primary"><i class="fa fa-plus"></i> Simpan</button>
</form>
@endsection