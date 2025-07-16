@extends('admin.layout')

@section('content')
  <h2>Tambah Menu Dimsum</h2>
  <form action="{{ route('admin.menu.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
      <label>Nama Menu</label>
      <input type="text" name="nama" class="form-control" required>
    </div>
    <div class="mb-3">
      <label>Deskripsi</label>
      <textarea name="deskripsi" class="form-control"></textarea>
    </div>
    <div class="mb-3">
      <label>Harga (Rp)</label>
      <input type="number" name="harga" class="form-control" required>
    </div>
    <div class="mb-3">
      <label>Gambar</label>
      <input type="file" name="gambar" class="form-control">
    </div>
    <button type="submit" class="btn btn-success">Simpan</button>
    <a href="{{ route('admin.menu') }}" class="btn btn-secondary">Kembali</a>
  </form>
@endsection
