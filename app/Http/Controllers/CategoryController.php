<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use RealRashid\SweetAlert\Facades\Alert;

class CategoryController extends Controller
{

    public function index()
    {
        $categories = Category::all();
        return view('kategori', compact('categories'));
    }

    public function store(CategoryRequest $request)
    {
        Category::create($request->all() + ['slug' => str_slug($request->name)]);

        Alert::success('Berhasil', 'Kategori berhasil ditambahkan');

        return to_route('kategori.index');
    }

    public function show($slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();
        return view('kategori-show', compact('category'));
    }

    public function update(CategoryRequest $request, $id)
    {
        $category = Category::findOrFail($id);
        $category->update($request->all());

        Alert::success('Berhasil', 'Kategori berhasil diperbarui');

        return to_route('kategori.index');
    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        Alert::success('Berhasil', 'Kategori berhasil dihapus');

        return to_route('kategori.index');
    }
}
