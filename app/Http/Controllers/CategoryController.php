<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Categories;

class CategoryController extends Controller
{

    public function index()
    {
        $categories = Categories::all();
        return response()->json($categories);
    }

    public function store(CategoryRequest $request)
    {

        Categories::create(
            $request->only([
                'nom',
                'description'
            ])
        );

        return response()->json(['success' => true, 'message' => 'Category added successfully.']);
    }


    public function delete($id)
    {
        $category = Categories::findOrFail($id);
        $category->delete();

        return response()->json(['success' => true, 'message' => 'Category deleted successfully.']);
    }


    public function putCategorie(CategoryRequest $request, $id)
    {

        $category = Categories::findOrFail($id);
        $category->update(
            $request->only([
                'nom',
                'description'
            ])
        );

        return response()->json(['success' => true, 'message' => 'Category updated successfully.']);
    }
}
