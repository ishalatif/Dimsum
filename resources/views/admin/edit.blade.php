@extends('admin.layout')

@section('content')
<div class="container py-4">
    <h2 class="mb-4">Edit Menu</h2>

    <form action="{{ route('admin.menu.update', $menu->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('POST') {{-- karena route update kamu pakai POST, bukan PUT --}}

        <div class="mb-3">
            <label for="nama" class="form-label">Nama Menu</label>
            <input type="text" class="form-control" name="nama" value="{{ old('nama', $menu->nama) }}" required>
        </div>

        <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <textarea class="form-control" name="deskripsi" rows="3">{{ old('deskripsi', $menu->deskripsi) }}</textarea>
        </div>

        <div class="mb-3">
            <label for="harga" class="form-label">Harga</label>
            <input type="number" class="form-control" name="harga" value="{{ old('harga', $menu->harga) }}" required>
        </div>

        <div class="mb-3">
            <label for="gambar" class="form-label">Gambar</label><br>
            @if($menu->gambar)
                <img src="{{ asset('storage/' . $menu->gambar) }}" width="150" class="mb-2"><br>
            @endif
            <input type="file" name="gambar" class="form-control">
        </div>

        <div class="d-flex justify-content-between">
            <a href="{{ route('admin.menu') }}" class="btn btn-secondary">Kembali</a>
            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        </div>
    </form>
</div>
@endsection
