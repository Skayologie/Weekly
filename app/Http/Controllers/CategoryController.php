<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\User;
use GuzzleHttp\Psr7\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("category.index", ["categories" => Category::where("isArchived",0)->all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("categorie",["categories" => Category::all()]); // Ensure your view is named correctly.
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {
        $formFields = $request->input();
        Category::create($formFields);
        return redirect("/categories");
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        $category = Category::getAllGlobalScopes();
        return view('categories.blade.php', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        //
    }

    public function archive($id){
        Category::where("id",$id)->update(["isArchived"=>1]);
        return redirect("/categories");
    }


    public function restore($id){
        Category::where("id",$id)->update(["isArchived"=>0]);
        return redirect("/categories");
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        //
    }
}
