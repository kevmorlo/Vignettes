<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (auth()->check() && auth()->user()->role != 'admin') {
            abort(403);
        } else {
            return Inertia::render('Category/Index', [
                'categories' => Category::all(),
            ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (auth()->check() && auth()->user()->role != 'admin') {
            abort(403);
        } else {
            return Inertia::render('Category/Create');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Category::create([
            'name' => $request->name,
            'enabled' => $request->enabled->default(false),
        ]);
        return back()->with('success', 'Category created.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        if (auth()->check() && auth()->user()->role != 'admin') {
            abort(403);
        } else {
            return Inertia::render('Category/Show', [
                'category' => $category->load('thumbnail'),
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        if (auth()->check() && auth()->user()->role != 'admin') {
            abort(403);
        } else {
            return Inertia::render('Category/Edit', [
                'category' => $category,
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        if (auth()->check() && auth()->user()->role != 'admin') {
            abort(403);
        } else {
            $category->update([
                'name' => $request->name,
                'enabled' => $request->enabled,
            ]);
            return back()->with('success', 'Category updated.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        if (auth()->check() && auth()->user()->role != 'admin') {
            abort(403);
        } else {
            $result = $category->delete();
            if ($result) {
                return back()->with('success', 'Category deleted.');
            } else {
                return back()->with('error', 'Nothing to delete');
            }
        }
    }
}
