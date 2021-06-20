<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subCategories = SubCategory::paginate(20);
        return view('dashboard.subcategory.index', compact('subCategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('dashboard.subcategory.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'category_id' => 'required',
            'name' => 'required'
        ]);

        if ($category = SubCategory::create($data)) {
            toastr()->success('SubCategory created successfully');
        } else {
            toastr()->error('SubCategory creation failed');
        }

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function show(SubCategory $subCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SubCategory  $subcategory
     * @return \Illuminate\Http\Response
     */
    public function edit(SubCategory $subcategory)
    {
        if ($subcategory) {
            $categories = Category::all();
            return view('dashboard.subcategory.edit', compact('subcategory', 'categories'));
        } else {
            toastr()->warning('Sub Category not found');
        }

        return back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SubCategory $subcategory)
    {
        $data =  $request->validate([
            'category_id' => 'required',
            'name' => 'required',
        ]);

        if ($subcategory) {
            if ($subcategory->update($data)) {
                toastr()->success('Sub Category updated successfully');
            } else {
                toastr()->error('Sub Category update failed');
            }
        } else {
            toastr()->warning('Sub Category not found');
        }

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(SubCategory $subcategory)
    {
        if ($subcategory) {
            if ($subcategory->delete()) {
                toastr()->success('Category deleted successfully');
            } else {
                toastr()->error('Category delete failed');
            }
        } else {
            toastr()->warning('Category not found');
        }

        return back();
    }
}
