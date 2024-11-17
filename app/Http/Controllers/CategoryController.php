<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Auth::user()->categories()->paginate(5);
       
        return view('category.index', [
            'categories' => $categories,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'bail|required|string|max:255',
            'category' => 'bail|required|string|max:255',
            'deadline' => 'bail|required|date'
        ]);

        auth()->user()->categories()->create($validated);
        return redirect()->route('category.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        if ($category->user_id !== Auth::id()) {
            //abort(403, 'Forbidden');
            return redirect()->route('auth.login');
        }
        return view('category.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'bail|required|string|max:255',
            'description' => 'bail|required|string|max:255',
            'category' => 'bail|required|string|max:255',
            'deadline' => 'bail|required|date'
        ]);

        $category->update([
            'name' => $request->name,
            'description' => $request->description,
            'category' => $request->category,
            'deadline' => $request->deadline
        ]);

        return redirect()->route('category.index');
    }

    /**
     * Marking the task as done
     */
    public function markAsDone(Request $request, $id)
    {
        // Update category status to done
        $category = Category::find($id);
        $category->status = 1;
        $category->save();

        return redirect()->route('category.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        if ($category->user_id !== Auth::id()) {
            // abort(403, 'Forbidden');
            return redirect()->route('auth.login');

        }

        $category->delete();
        return redirect()->route('category.index');
    }
}
