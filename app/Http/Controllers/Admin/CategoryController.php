<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();

        return(view('admin.categories.index', compact('categories')));
    }

    public function create()
    {
        return(view('admin.categories.create'));
    }

    public function store(StoreCategoryRequest $request)
    {
        Category::create($request->validated());

        return redirect(route('categories.index'));
    }

    public function show(Category $category)
    {

    }

    public function edit(Category $category)
    {
        return(view('admin.categories.edit', compact('category')));
    }

    public function update(Category $category, UpdateCategoryRequest $request)
    {
        $category->update($request->validated());

        redirect(route('categories.index'));
    }

    public function destroy(Category $category)
    {
        $category->delete();

        return redirect(route('categories.index'));
    }
}
