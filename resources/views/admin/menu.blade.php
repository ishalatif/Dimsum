@extends('admin.layout')

@section('content')
<div class="container py-4">
    <h2 class="mb-4">Daftar Menu Dimsum</h2>

    <a href="{{ route('admin.menu.create') }}" class="btn btn-primary mb-4">+ Tambah Menu</a>
    <a href="{{ route('dimsum') }}" class="btn btn-success mb-4">toko</a>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="row">
        @forelse ($menus as $menu)
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm">
                    @if($menu->gambar)
                        <img src="{{ asset('storage/' . $menu->gambar) }}" class="card-img-top" style="height:200px; object-fit:cover;" alt="{{ $menu->nama }}">
                    @else
                        <img src="https://via.placeholder.com/300x200?text=No+Image" class="card-img-top" alt="No Image">
                    @endif

                    <div class="card-body">
                        <h5 class="card-title">{{ $menu->nama }}</h5>
                        <p class="card-text">{{ $menu->deskripsi }}</p>
                        <p class="fw-bold text-success">Rp {{ number_format($menu->harga) }}</p>
                    </div>

                    <div class="card-footer d-flex justify-content-between">
                        <a href="{{ route('admin.menu.edit', $menu->id) }}" class="btn btn-warning btn-sm">Edit</a>

                        <form action="{{ route('admin.menu.delete', $menu->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus menu ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12 text-center">
                <p>Tidak ada menu yang tersedia.</p>
            </div>
        @endforelse
    </div>
</div>
@endsection
