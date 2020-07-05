@extends('layouts.master')

@section('content')
<form action="{{ route('artikel.update', ['id' => $artikel->id]) }}" method="post">
	<h4 class="text-center">Buat Artikel</h4>
	{{ csrf_field() }}
    <input type="hidden" name="_method" value="put">
	<input type="hidden" name="id" value="{{ $artikel->id }}">
	<div class="form-group">
		<label for="judul">Judul</label>
		<input type="text" name="judul" id="judul" class="form-control" value="{{ $artikel->judul }}">
	</div>
	<div class="form-group">
		<label for="isi">Isi</label>
		<input type="text" name="isi" id="isi" class="form-control" value="{{ $artikel->isi }}">
	</div>
	<div class="form-group">
		<label for="tag">Tag</label>
		<input type="text" name="tag" id="tag" class="form-control" value="{{ $artikel->tag }}">
	</div>
	<button class="btn btn-primary"><i class="fa fa-plus"></i> Simpan</button>
</form>
@endsection