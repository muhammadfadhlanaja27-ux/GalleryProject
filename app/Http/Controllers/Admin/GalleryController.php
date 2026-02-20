<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    public function index() {
        $galleries = Gallery::latest()->get();
        return view('admin.gallery.index', compact('galleries'));
    }

    public function create() {
        return view('admin.gallery.create');
    }

    // --- FITUR MULTI-UPLOAD ---
    public function store(Request $request) {
        $request->validate([
            'title' => 'required|max:255',
            'category' => 'required',
            'image' => 'required', 
            'image.*' => 'image|max:10240', // Validasi setiap file di dalam array
        ]);

        if ($request->hasFile('image')) {
            $files = $request->file('image');
            
            foreach ($files as $file) {
                // Simpan file fisik
                $imagePath = $file->store('gallery', 'public');

                // Simpan ke Database
                Gallery::create([
                    'title' => $request->title,
                    // Tambahkan random string di slug agar tidak error Duplicate Entry
                    'slug' => Str::slug($request->title) . '-' . Str::lower(Str::random(5)),
                    'category' => $request->category,
                    'image' => $imagePath,
                    'description' => $request->description,
                ]);
            }
        }

        return redirect()->route('admin.gallery.index')->with('success', count($files) . ' Foto berhasil ditambah!');
    }

    public function edit($id) {
        $gallery = Gallery::findOrFail($id);
        return view('admin.gallery.edit', compact('gallery'));
    }

    public function update(Request $request, $id) {
        $gallery = Gallery::findOrFail($id);
        
        $request->validate([
            'title' => 'required|max:255',
            'category' => 'required',
            'image' => 'nullable|image|max:10240',
        ]);

        if ($request->hasFile('image')) {
            Storage::disk('public')->delete($gallery->image);
            $gallery->image = $request->file('image')->store('gallery', 'public');
        }

        $gallery->update([
            'title' => $request->title,
            // Saat update satu per satu, slug tetap kita beri random untuk keamanan
            'slug' => Str::slug($request->title) . '-' . Str::lower(Str::random(5)),
            'category' => $request->category,
            'description' => $request->description,
        ]);

        return redirect()->route('admin.gallery.index')->with('success', 'Foto berhasil diperbarui!');
    }

    public function destroy($id) {
        $gallery = Gallery::findOrFail($id);
        Storage::disk('public')->delete($gallery->image);
        $gallery->delete();

        return redirect()->route('admin.gallery.index')->with('success', 'Foto berhasil dihapus!');
    }
}