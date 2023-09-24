<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;

class RecipeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        //
        return Inertia::render('Recipe/Index', [
            'recipes' => Recipe::with('user:id,name')->latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        //
        $validated = $request->validate([
            'message' => 'required|string',
            'title' => 'required|string|max:40',
            'ingridients' => 'required|string',
        ]);

        $request->user()->recipes()->create($validated);

        return redirect(route('recipe.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Recipe $recipe)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Recipe $recipe)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Recipe $recipe): RedirectResponse
    {
        //
        $this->authorize('update', $recipe);

        $validated = $request->validate([
            'message' => 'required|string',
            'title' => 'required|string',
            'ingridients' => 'required|string',
        ]);

        $recipe->update($validated);

        return redirect(route('recipe.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Recipe $recipe): RedirectResponse
    {
        //

        $this->authorize('delete', $recipe);

        $recipe->delete();

        return redirect(route('recipe.index'));
    }

    public function like(Recipe $recipe): JsonResponse
    {


        DB::transaction(function () use ($recipe) {
            $recipe->increment('likes');
        });

        $recipe->refresh();


        return response()->json(['success' => true, 'likes' => $recipe->likes]);
    }

}
