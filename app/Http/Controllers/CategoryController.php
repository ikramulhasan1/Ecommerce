<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Exception;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;


class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('backend.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('backend.categories.create');
    }

    public function store(CategoryRequest $request)
    {
        try {
            $data = $request->all();
            Category::create($data);
            return redirect()->route('categories.index')->withSuccess('category successfully created');

        } catch (Exception $e) {
            return redirect()->back()->withErrors($e->getMessage());
        }
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('backend.categories.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->except('_token');
        Category::where('id', $id)->update($data);
        return redirect()->route('category.index')->withSuccess('category updated successfully');
    }
}