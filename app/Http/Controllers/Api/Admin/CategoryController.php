<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Admin\Category\StoreRequest;
use App\Http\Requests\Api\Admin\Category\UpdateRequest;
use App\Http\Resources\Category\CategoryResource;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        return CategoryResource::collection(Category::all())->resolve();
    }

    public function show(Category $category) {
        return CategoryResource::make($category)->resolve();
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        $category = Category::create($data);
        return CategoryResource::make($category)->resolve();
    }

    public function update(Category $category, UpdateRequest $request)
    {
        $data = $request->validated();
        $category->update($data);
        return CategoryResource::make($category)->resolve();
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return response(['message' => 'deleted'], 200);
    }
}
