<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use App\Models\Category;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $b = Book::with('category')->get(); // Ambil semua data buku beserta kategori terkait
        return view('book.index', compact('b'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all(); // Ambil semua kategori untuk dropdown
        return view('book.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'isbn' => 'required|string|max:20|unique:book,isbn',
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:60',
            'description' => 'nullable|string|max:150',
            'cover' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'publish_year' => 'required|integer|min:1000|max:' . date('Y'),
            'category_idcategory' => 'required|exists:category,idcategory',
        ]);
        

        $coverPath = null;
        if ($request->hasFile('cover')) {
            $validateData['cover'] = $validateData['isbn'] . '.' . $request->file('cover')->getClientOriginalExtension();
            $request->file('cover')->storeAs('uploads', $validateData['cover'], 'public');
        }

        Book::create($validateData + ['cover' => $coverPath]);

        return redirect()->route('book.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        $categories = Category::all(); // Ambil semua kategori untuk dropdown
        return view('book.edit', compact('book', 'categories')); 
        //yang book itu nama variabel yang dikirim ke view, yang book yang dalam kurung itu parameter yang diambil dari route
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
    {
        $validateData = $request->validate([ //ini untuk si validasi data yang masuk ke database
            'title' => 'required|string|max:255',
            'cover' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'author' => 'required|string|max:60',
            'description' => 'nullable|string|max:150',
            'publish_year' => 'required|integer|min:1000|max:' . date('Y')
        ]);

        $book->update($request->all());

        $coverPath = $book->cover; // Simpan path cover lama
        if ($request->hasFile('cover')) {
            $validateData['cover'] = $book->isbn . '.' . $request->file('cover')->getClientOriginalExtension();
            $request->file('cover')->storeAs('uploads', $validateData['cover'], 'public');
        }

        $coverPath = $validateData['cover'] ?? $coverPath; // Gunakan path cover baru jika ada, jika tidak gunakan yang lama
        $book->update(['cover' => $coverPath]); // Update path cover di database


        return redirect()->route('book.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        $book->delete();
        $coverPath = public_path('storage/uploads/' . $book->cover);
        if (file_exists($coverPath)) {
            unlink($coverPath); // Hapus file cover dari storage
        }

        return redirect()->route('book.index');
    }
}
