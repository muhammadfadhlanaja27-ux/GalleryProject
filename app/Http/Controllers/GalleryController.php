<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\View\View;

class GalleryController extends Controller
{
    // Menampilkan SEMUA foto di halaman Gallery
    public function index(): View
    {
        // Ambil semua data terbaru
        $galleries = Gallery::latest()->get();

        // Di screenshot lu, nama filenya 'index.blade.php', jadi panggil 'index'
        return view('gallery', compact('galleries'));
    }

    // Menampilkan detail satu foto
    public function show($id): View
    {
        $gallery = Gallery::findOrFail($id);

        // Di screenshot lu, nama filenya 'gallery-single.blade.php', jadi panggil 'gallery-single'
        return view('gallery-single', compact('gallery'));
    }

    // Tambahkan function ini di dalam class GalleryController
    public function category($category): View
    {
        // Mengambil data yang kategorinya sama dengan parameter di URL
        // Kita gunakan latest() agar foto terbaru muncul di atas
        $galleries = Gallery::where('category', $category)->latest()->get();

        // Kita tetap pakai view 'gallery' yang sama agar tidak perlu buat file baru
        // Kita kirimkan variabel $category juga untuk judul halaman nantinya
        return view('gallery', compact('galleries', 'category'));
    }
}