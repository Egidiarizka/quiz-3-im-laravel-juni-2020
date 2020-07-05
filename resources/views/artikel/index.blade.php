@extends('layouts.master')

@section('style')
<link rel="stylesheet" type="text/css" href="{{ asset('css/datatables.min.css') }}">
<style type="text/css">
	.card-title {
		float: left;
	}
	.btn {
		margin: 5px;
	}
</style>
@endsection

@section('content')
<div class="card">
      <div class="card-header">
        <h3 class="card-title" style="margin-top: 5px;">Tabel Artikel</h3>
        <a href="{{ route('artikel.create') }}" class="btn btn-primary" style="float: right;"><i class="fa fa-plus"></i> Buat artikel</a>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        @if(session()->has('success'))
          <div class="alert alert-success">
            {{ session()->get('success') }}
          </div>
        @endif
        @if(session()->has('error'))
          <div class="alert alert-danger">
            {{ session()->get('error') }}
          </div>
        @endif
        <table id="example1" class="table table-bordered table-striped">
          <thead>
          <tr>
            <th>Nomor</th>
            <th>Judul</th>
            <th>Isi</th>
            <th>Slug</th>
            <th>Tag</th>
            <th>Action</th>
          </tr>
          </thead>
          <tbody>
            @foreach($artikels as $artikel)
              <tr>
                <td>{{ $loop->index + 1 }}</td>
                <td>{{ $artikel->judul }}</td>
                <td>{{ $artikel->isi }}</td>
                <td>{{ $artikel->slug }}</td>
                <td>{{ $artikel->tag }}</td>
                <td>
                  <a href="{{ route('artikel.show', ['id' => $artikel->id]) }}" class="btn btn-info">Lihat</a>
                  <a href="{{ route('artikel.edit', ['id' => $artikel->id]) }}" class="btn btn-warning">Edit</a>
                  <form id="submit" action="{{ route('artikel.delete', ['id' => $artikel->id]) }}" method="post">
                    {{ csrf_field() }}
                    <input type="hidden" name="_method" value="delete">
                    <button class="btn btn-danger" type="submit">Hapus</button>
                  </form>
                </td>
              </tr>
            @endforeach
          </tbody>
          <tfoot>
          <tr>
            <th>Nomor</th>
            <th>Judul</th>
            <th>Isi</th>
            <th>Slug</th>
            <th>Tag</th>
            <th>Action</th>
          </tr>
          </tfoot>
        </table>
      </div>
      <!-- /.card-body -->
    </div>
@endsection

@section('script')
<script src="{{ asset('js/datatables.min.js') }}"></script>
<script>
    Swal.fire({
        title: 'Berhasil!',
        text: 'Memasangkan script sweet alert',
        icon: 'success',
        confirmButtonText: 'Cool'
    })
</script>
<script>
  $(function () {
    $("#example1").DataTable();
  });
</script>
@endsection