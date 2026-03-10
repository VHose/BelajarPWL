<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $a = Category::all(); //ini ngambil semua data category
        // $pilihCategory = Category::select('id', 'name','description')->get(); //ini buat nampilin data category di dropdown
        return view('category.index', compact('a')); // yang .index tuh yang kiri nama folder trs cari incex
        // yang kanan itu nama variabel yang dikirim ke view itu namanya sama kayak nama var yang menyimpan si all nya.
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([ //ini untuk si validasi data yang masuk ke database
            'name' => 'required|string|max:60', //wajib di isi 
            'description' => 'nullable|string|max:150',  //boleh kosong
        ]);

        Category::create($request->all());

        return redirect()->route('category.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('category.edit', compact('category')); 
        //yang category itu nama variabel yang dikirim ke view, yang category yang dalam kurung itu parameter yang diambil dari route
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([ //ini untuk si validasi data yang masuk ke database
            'name' => 'required|string|max:60', //wajib di isi 
            'description' => 'nullable|string|max:150',  //boleh kosong
        ]);

        $category->update($request->all());

        return redirect()->route('category.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('category.index');
    }
}
