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
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255',
            'endpoint' => 'required|string|max:255',
        ]);

        Category::create($request->all() + ['slug' => str_slug($request->name)]);

        Alert::success('Berhasil', 'Kategori berhasil ditambahkan');

        return to_route('kategori.index');
    }

    public function show(Category $category)
    {
        return view('kategori-show', compact('category'));
    }

    public function update(CategoryRequest $request, Category $category)
    {
        $category->update($request->all());

        Alert::success('Berhasil', 'Kategori berhasil diperbarui');

        return to_route('kategori.index');
    }

    public function destroy(Category $category)
    {
        $category->delete();

        Alert::success('Berhasil', 'Kategori berhasil dihapus');

        return to_route('kategori.index');
    }
}
