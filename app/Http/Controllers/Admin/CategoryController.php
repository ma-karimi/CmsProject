<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{

    public function index()
    {
        $categories = Category::paginate(5);
        return view('admin.categories.index')->withCategories($categories);
    }


    public function create()
    {
        return view('admin.categories.create');
    }


    public function store(CreateCategoryRequest $request)
    {
        $pictue_name =  request('alt') . '-' . Carbon::now()->timestamp
            . '.' . $request->file('image')->getClientOriginalExtension();
        $request['path'] = $request->file('image')->storePubliclyAs('posts', $pictue_name);

        $category = Category::create($request->validated());
        $category->image()->create([
            'title' => $request->alt,
            'alt' => $request->alt,
            'path' => $request->path,
        ]);
        return redirect()->route('categories.index')
            ->with('status','دسـتــه بنـدی جدید با موفقـیت ساختـه شـد.');
    }


    public function show(Category $category)
    {
        //
    }


    public function edit(Category $category)
    {
        return view('admin.categories.edit')->withCategory($category);
    }


    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $pictue_name =  request('alt') . '-' . Carbon::now()->timestamp
            . '.' . $request->file('image')->getClientOriginalExtension();
        $request['path'] = $request->file('image')->storePubliclyAs('posts', $pictue_name);

        $category = Category::where($category->id)->update($request->validated());
        $category->image()->update([
            'title' => $request->alt,
            'alt' => $request->alt,
            'path' => $request->path,
        ]);
        return redirect()->route('categories.index')
            ->with('status','دسـتــه بنـدی جدید با موفقـیت ساختـه شـد.');
    }


    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->back();
    }
}
