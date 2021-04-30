<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;

class CategoryController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $catgs = Category::paginate(20);
        return view('categories.index')->with('catgs', $catgs);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        $catg = new Category;
        $catg->name = $request->name;
        if ($request->hasFile('image')) {
            $file = time() . '.' . $request->image->extension();
            $request->image->move(public_path('imgs'), $file);
            $catg->image = 'imgs/' . $file;
        }
        $catg->description = $request->description;

        if ($catg->save()) {
            return redirect('categories')->with('message', 'The Category: ' . $catg->name . ' was successfully added');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        return view('categories.show')->with('category', $category);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('categories.edit')->with('category', $category);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, Category $category)
    {
        $category->name  = $request->name;
        if ($request->hasFile('image')) {
            $file = time() . '.' . $request->image->extension();
            $request->image->move(public_path('imgs'), $file);
            $category->image = 'imgs/' . $file;
        }
        $category->description = $request->description;

        if ($category->save()) {
            return redirect('categories')->with('message', 'The Category: ' . $category->name . ' was successfully edited');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        if ($category->delete()) {
            return redirect('categories')->with('message', 'The Category: ' . $category->name . ' was successfully deleted');
        }
    }

    public function search(Request $request)
    {
        $catgs = Category::names($request->q)->orderBy('id', 'DESC')->paginate(20);
        return view('categories.search')->with('catgs', $catgs);
    }
}
