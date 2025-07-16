<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MenuController extends Controller
{
    // Menampilkan dashboard dengan semua menu
    public function index()
    {
        $menus = Menu::all();
        return view('admin.menu', compact('menus'));
    }

    // Form tambah menu
    public function create()
    {
        return view('admin.create');
    }

    // Simpan data menu baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required',
            'deskripsi' => 'required',
            'harga' => 'required|numeric',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('gambar')) {
            $validated['gambar'] = $request->file('gambar')->store('gambar', 'public');
        }

        Menu::create($validated);

        return redirect()->route('admin.menu')->with('success', 'Menu berhasil ditambahkan.');
    }

    // Form edit menu
    public function edit(Menu $menu)
    {
        $menus = Menu::all();
        return view('admin.edit', compact('menu'));
    }

    // Update menu
    public function update(Request $request, $id)
{
    $request->validate([
        'nama' => 'required',
        'deskripsi' => 'nullable|string',
        'harga' => 'required|numeric',
        'gambar' => 'nullable|image|max:2048',
    ]);

    $menu = Menu::findOrFail($id);

    if ($request->hasFile('gambar')) {
        // hapus gambar lama
        if ($menu->gambar) {
            Storage::disk('public')->delete($menu->gambar);
        }

        $path = $request->file('gambar')->store('menu', 'public');
        $menu->gambar = $path;
    }

    $menu->nama = $request->nama;
    $menu->deskripsi = $request->deskripsi;
    $menu->harga = $request->harga;
    $menu->save();

    return redirect()->route('admin.menu')->with('success', 'Menu berhasil diupdate!');
}


    // Hapus menu
    public function destroy(Menu $menu)
    {
        if ($menu->gambar) {
            Storage::disk('public')->delete($menu->gambar);
        }
        $menu->delete();

        return redirect()->route('admin.menu')->with('success', 'Menu berhasil dihapus.');
    }

    
}
